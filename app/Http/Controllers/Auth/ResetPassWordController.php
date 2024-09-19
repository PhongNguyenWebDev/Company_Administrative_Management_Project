<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ResetPassWordController extends Controller
{
    /**
     * Gửi email đặt lại mật khẩu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);
        // Gửi email bằng mailable
        Mail::to($request->email)->send(new ForgotPasswordEmail($token));
        return redirect()->to(route('showForm'))->with('success', 'Please check your email');
    }

    /**
     * Hiển thị form reset mật khẩu với token đã cung cấp.
     *
     * @param  string  $token
     * @return \Illuminate\Contracts\View\View
     */
    public function passwordReset(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Cập nhật mật khẩu mới sau khi reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate(Request $request)
    {
        // Validate input
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $token = $request->token;
        $resetToken = DB::table('password_reset_tokens')->where('token', '=', $token)->first();

        if (!$resetToken) {
            return redirect()->back()->with('error', 'Invalid token');
        } else {
            $user = User::where('email', $resetToken->email)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'User not found');
            } else {
                $user->password = Hash::make($request->password);
                $user->must_change_password = true;
                $user->save();
                DB::table('password_reset_tokens')->where('token', $token)->delete();
                return redirect()->route('login')->with('success_reset', 'Password reset successfully');
            }
        }
    }
}
