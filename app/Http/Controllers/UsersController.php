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
}
