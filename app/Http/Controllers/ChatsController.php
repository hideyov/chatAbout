<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
		{
			$data = [];
			if (\Auth::check()) {
				$user = \Auth::user();
				$chats = $user->chats()->orderBy('created_at', 'desc')->paginate(5);
				
				$data = [
					'user' => $user,
					'chats' => $chats,
				];
			}
			return view('welcome', $data);
		}
		
		public function store(Request $request)
		{
			$this->validate($request, [
				'content' => 'required|max:191',
			]);
			
			$request->user()->chats()->create([
				'content' => $request->content,
			]);
			
			return back();
		}
	
		public function destroy($id)
		{
			$chat = \App\Chat::find($id);
			
			if (\Auth::id() === $chat->user_id) {
				$chat->delete();
			}
			
			return back();
		}
}
