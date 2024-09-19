<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($id)
    {
        $user = User::where('id', '=', $id)->whereNull('email_verified_at')->firstOrFail();
        if (!empty($user)) {
            $user->update([
                'email_verified_at' => now()->format('Y-m-d H:i:s'),
                'status' => true,
            ]);
            return redirect('auth.login')->with('message', 'Your email has been verified.');
        } else {
            abort(404);
        }
    }
}
