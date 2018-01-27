<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		\App::setLocale('en');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */	
	public function login()
	{
		if(session('id')) return redirect('/');
		else return view('login');
	}
	
	public function login_act(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
		
        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }
		else
		{
			$user = DB::table('users')->where('username', $request->username)->first();
			if(empty($user))
			{
				return view('login')->with('message', trans('messages.user_not_exist'));
			}
			elseif(!password_verify($request->password, $user->password))
			{
				return view('login')->with('message', trans('messages.wrong_password'));;
			}
			else
			{
				session(['id' => $user->id]);
				session(['isadmin' => $user->isadmin]);
				return redirect('/');
			}
		}
	}
	
	public function logout()
	{
		Session::flush();
		return redirect('/');
	}

}
