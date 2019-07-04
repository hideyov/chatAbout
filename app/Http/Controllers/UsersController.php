<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
	public function index() 
	{
		$users = User::orderBy('id', 'desc')->paginate(5);
		
		return view('users.index', [
			'users' => $users,
		]);
	}
	
	public function show($id)
	{
		$user = User::find($id);
		$chats = $user->chats()->orderBy('created_at', 'desc')->paginate(4);
		
		$data = [
			'user' => $user,
			'chats' => $chats,
		];
		
		$data += $this->counts($user);
		
		return view('users.show', $data);
	}
	
	public function followings($id)
	{
		$user = User::find($id);
		$followings = $user->followings()->paginate(5);
		
		$data = [
			'user' => $user,
			'users' => $followings,
		];
		
		$data += $this->counts($user);
		
		return view('users.followings', $data);
	}
	
	public function followers($id)
	{
		$user = User::find($id);
		$followers = $user->followers()->paginate(5);
		
		$data = [
			'user' => $user,
			'users' => $followers,
		];
		
		$data += $this->counts($user);
		
		return view('users.followers', $data);
	}
	
    public function favorites($id)
    {   
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(5);
    
        $data = [ 
            'user' => $user,
            'chats' => $favorites,
        ];  
    
        $data += $this->counts($user);
    
        return view('users.favorites', $data);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'content' => 'max:191', // required は不要？
      ]);
      
      $request->user()->profile->post([
        'content' => $request->content,
      ]);

      return back();
    }

	public function edit($id) 
	{

		return view('users.edit', ['id' => $id]);			
	}

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'max:191', // required は不要？
        ]);

		//dd(\App\User::find($id)->profile);
		//dd($id);
		
    	$user = \App\User::find($id);
    	$user->profile = $request->content;
    	$user->save();

    	return redirect('/');
    }		
}
