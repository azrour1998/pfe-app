<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use App\Http\Controllers\Auth\DB;
use GuzzleHttp\Psr7\Request;

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
    function validatePasswordRequest(Request $request){
    $user = DB::table('users')->where('email', '=', $request->email)
    ->first();
//Check if the user exists
if (count($user) < 1) {
    return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
}

//Create Password Reset Token
DB::table('password_resets')->insert([
    'email' => $request->email,
    'token' => str_random(60),
    'created_at' => Carbon::now()
]);
//Get the token just created above
$tokenData = DB::table('password_resets')
    ->where('email', $request->email)->first();

if ($this->sendResetEmail($request->email, $tokenData->token)) {
    return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
} else {
    return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
}}
public function resetPassword(Request $request)
{
    //Validate input
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed'
        'token' => 'required' ]);

    //check if payload is valid before moving on
    if ($validator->fails()) {
        return redirect()->back()->withErrors(['email' => 'Please complete the form']);
    }

    $password = $request->password;
// Validate the token
    $tokenData = DB::table('password_resets')
    ->where('token', $request->token)->first();
// Redirect the user back to the password reset request form if the token is invalid
    if (!$tokenData) return view('auth.passwords.email');

    $user = User::where('email', $tokenData->email)->first();
// Redirect the user back if the email is invalid
    if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
//Hash and update the new password
    $user->password = \Hash::make($password);
    $user->update(); //or $user->save();

    //login the user immediately they change password successfully
    Auth::login($user);

    //Delete the token
    DB::table('password_resets')->where('email', $user->email)
    ->delete();

    //Send Email Reset Success Email
    if ($this->sendSuccessEmail($tokenData->email)) {
        return view('login');
    } else {
        return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
    }

}
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
}
