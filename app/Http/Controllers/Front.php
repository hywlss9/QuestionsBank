<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util;
use Illuminate\Http\Request;

class Front
{
	public function index(Request $request)
	{
		$result = view('index');
		$result -> subjects = DB::table('subject')
			->select('name')
			->addSelect('idx')
			->orderBy('idx')
		->get();
		return $result;
	}
}