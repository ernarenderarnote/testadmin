<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\MobileRequest;
use App\Http\Requests\OtpRequest;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	/**
    * Handle Social login request
    *
    * @return response
    */
	public function socialLogin($social)
	{
	   return Socialite::driver($social)->redirect();
	}
	/**
	* Obtain the user information from Social Logged in.
	* @param $social
	* @return Response
	*/
	public function handleProviderCallback($social)
	{
		$userSocial = Socialite::driver($social)->stateless()->user();
		$user = User::where(['email' => $userSocial->getEmail()])->first();
	    if($user){
		   Auth::login($user);
			//dd($userSocial);
		   return redirect()->intended($this->redirectTo);
	    }else{
		   $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $social,
            ]);
			$user->roles()->attach(2);
			Auth::login($user);
			$info = ['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()];
			return redirect()->intended($this->redirectTo);
		}
	}
	public function login(Request $request){
		return view('auth.login');
	}
	
	public function otp(Request $request){
		$action = $request->route()->getAction();
		if ($request->isMethod('post')) {
			$this->validate($request, $this->stepOneRules(), $this->stepOneMsg());
		}
		return view('auth.otp')->with('mobile_number',$request->phone);
	}
	
	public function otpValidate(Request $request){
		if ($request->isMethod('post')) {
			$this->validate($request, $this->otpRules(), $this->otpMsg());
			$otp = '123456';
			if($otp != $request->otp){
				return response()->json([
					'error' => true,
					'msg' => 'otp is incorrect.'
				]);
			}else{
				$user = User::where('email','admin@admin.com')->first();
				Auth::login($user);
				return response()->json([
					'error' => false,
					'redirect_url' => $this->redirectTo
				]);
			}		
		}
	}
	
	public function stepOneRules()
    {
        return [
                 "phone" => "required"
        ];
    }

    public function stepOneMsg()
    {
        return [
                "phone.required" => 'Mobile number is required.',
           
        ];
    }
	
	public function otpRules()
    {
        return [
                 "otp" => "required"
        ];
    }

    public function otpMsg()
    {
        return [
                "otp.required" => 'Otp is required.',
           
        ];
    }
}
