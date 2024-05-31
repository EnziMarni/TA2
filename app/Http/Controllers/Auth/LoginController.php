<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();
        $errorMessages = [];

        if (!$user) {
            // Jika username/email tidak ditemukan
            $errorMessages['email'] = 'Username salah.';
        } elseif (!Hash::check($request->password, $user->password)) {
            // Jika username/email ditemukan tetapi password salah
            $errorMessages['password'] = 'Password salah.';
        }

        if ($user === null && !empty($request->password)) {
            // Jika username/email dan password salah
            $errorMessages = [
                'email' => 'Username dan Password salah.',
                'password' => 'Username dan Password salah.'
            ];
        }

        if (!empty($errorMessages)) {
            throw ValidationException::withMessages($errorMessages);
        }
    }
}
