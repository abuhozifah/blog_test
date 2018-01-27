<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PostsController extends Controller {

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
	public function index()
	{
		$posts = DB::table('posts')->select('id', 'title')->orderBy('id', 'desc')->get();
		return view('posts')->with('posts', $posts);
	}
	
	public function search(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'category' => 'required',
        ]);
		
        if ($validator->fails()) {
            return redirect('posts')
                        ->withErrors($validator)
                        ->withInput();
        }
		else
		{
			if($request->category) $posts = DB::table('posts')->select('id', 'title')->where('category', $request->category)->orderBy('id', 'desc')->get();
			else $posts = DB::table('posts')->select('id', 'title')->orderBy('id', 'desc')->get();
			return view('posts')->with('posts', $posts);
		}
	}
	
	public function add()
	{
		if(session('isadmin')) return view('add');
		else return redirect('/');
	}
	
	public function add_act(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
			'category' => 'required',
        ]);
		
        if ($validator->fails()) {
            return redirect('add')
                        ->withErrors($validator)
                        ->withInput();
        }
		else
		{
			$post_id = DB::table('posts')->insertGetId(
				['user' => session('id'),'title' => $request->title, 'body' => $request->body, 'category' => $request->category]
			);
			if(!$post_id)
			{
				return view('add')->with('message', trans('messages.something_wrong'));
			}
			else
			{
				return view('add')->with('message', trans('messages.success'));;
			}
		}
	}
	
	public function view($id)
	{
		$post = DB::table('posts')
			->Join('users', 'users.id', '=', 'posts.user')
			->select('posts.id as id','posts.title as title','posts.body as body','users.username as username')
			->where('posts.id', $id)->orderBy('posts.id', 'desc')->first();

		$comments = DB::table('comments')
			->Join('users', 'users.id', '=', 'comments.user')
			->select('users.username as username','comments.body as body')
			->where('comments.post', $id)->orderBy('comments.id', 'desc')->get();

		return view('post')->with(array('post'=>$post,'comments'=>$comments));
	}
	
	public function comment(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'post' => 'required|integer',
            'body' => 'required',
        ]);
		
        if ($validator->fails()) {
            return redirect('post/'.$request->post)
                        ->withErrors($validator)
                        ->withInput();
        }
		else
		{
			$comment_id = DB::table('comments')->insertGetId(
				['user' => session('id'),'post' => $request->post, 'body' => $request->body]
			);
			if(!$comment_id)
			{
				return redirect('post/'.$request->post)->with('message', trans('messages.something_wrong'));
			}
			else
			{
				return redirect('post/'.$request->post)->with('message', trans('messages.success'));
			}
		}
	}
}
