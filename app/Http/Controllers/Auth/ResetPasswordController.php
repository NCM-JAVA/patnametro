<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function resetpassword()
    {

        $title = "Reset Password";
        return view('auth/passwords/resetadmin', compact(['title']));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'Currunt_Password' => 'required',
            'New_Password' => [
                'required',
                'min:8',
                'max:15',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/'
            ],
            'confirm_password' => ['required', 'same:New_Password'],
        ], [
            'New_Password.regex' => 'Password must be 8–15 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character.'
        ]);

        $user = Auth::user();
        $currentPasswordStatus = Hash::check($request->Currunt_Password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->New_Password),
				'password_changed_at' => now(),
            ]);
			
			// Auth::logoutOtherDevices($request->New_Password);

        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

            return redirect()->back()->with('change_pass_success', 'Password changed successfully!');

        } else {

            return redirect()->back()->withErrors(['current_password' => 'Current Password does not match with Old Password']);

        }
    }
}
