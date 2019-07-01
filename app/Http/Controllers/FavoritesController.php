<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Request $request, $id)
	{
		\Auth::user()->favour($id);
		return back();
	}
	
    public function destroy($id)
	{
		\Auth::user()->unfavour($id);
		return back();
	}
}
