<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Models\User;
use Exception;
use App\Jobs\ResendVerificationEmail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (Auth::attempt($credentials)) {
                if (Auth::user()->status === 1 && Auth::user()->must_change_password === 1) {
                    $user = Auth::user();
                    $userName = $user->name;
                    Session::put('user_name', $userName);
                    return redirect()->route('dashboard');
                } else {
                    Auth::logout();
                    return redirect()->back()->withErrors(['email' => 'Tài khoản của bạn chưa xác thực hoặc chưa thay đổi xin vui lòng kiểm tra lại email .']);
                }
            } else {
                return redirect()->back()->withErrors(['email' => 'Sai tài khoản mật khẩu.']);
            }
        } catch (Exception $exception) {
            Log::channel('application')->error($exception->getMessage());
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
        }
    }



    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        // Tạo người dùng mới
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company' => $data['company'],
            'force_change_password' => true,
            'status' => false,
        ]);
        // Gửi email xác nhận
        Mail::to($user->email)->send(new VerifyEmail($user));
        ResendVerificationEmail::dispatch($user)->delay(now()->addMinutes(1));
        // Chuyển hướng hoặc trả về thông báo thành công
        return redirect()->back()->with('announce', 'Bạn hãy xác thực tài khoản của mình trong email');
    }
    public function verify($id)
    {
        $user = User::where('id', '=', $id)->whereNull('email_verified_at')->firstOrFail();
        if (!empty($user)) {
            $user->update([
                'email_verified_at' => now()->format('Y-m-d H:i:s'),
                'status' => true,
            ]);
            return redirect('login')->with('message', 'Your email has been verified.');
        } else {
            abort(404);
        }
    }
    public function logoutPage()
    {
        return view('auth.logout');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('logoutPage');
    }
}
