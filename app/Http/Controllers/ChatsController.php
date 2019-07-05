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
				$chats = $user->feed_chats()->orderBy('created_at', 'desc')->paginate(5);
				
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
		
		public function edit($id) {
			return view('chats.edit', ['id' => $id]);			
		}
		
        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'content' => 'required|max:191', // required は不要？
            ]);

			//dd(\App\Chat::find($id));
			//dd($id);
		
    		$chat = \App\Chat::find($id);
    		$chat->content = $request->content;
    		$chat->save();

    		return redirect('/');

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
