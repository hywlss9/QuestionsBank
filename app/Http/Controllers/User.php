<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util;

class User
{
	public function login(Request $request)
	{
		$temp = DB::table('admin_user')
			->select('idx')
			->whereraw("login_pw=sha('{$request->input('pw')}')")
			->whereraw("login_id='{$request->input('id')}'")
			->first();
		if($temp -> idx != null){
			$request->session()->put('user_id',$temp->idx);
		}
	}
}