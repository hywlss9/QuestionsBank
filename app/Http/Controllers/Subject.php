<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util;

class Subject
{
	public function new(Request $request)
	{
		$data = ['name' => $request->input('name')];
		DB::table('subject')->insert($data);
		return redirect('/admin');
	}
	public function view(Request $request){
		$result = view('viewSubject');
		$result -> data = DB::table('subject')
			->select('name')
			->orderBy('idx')
		->get();
		return $result;
	}
}