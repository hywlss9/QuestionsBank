<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util;

class Admin
{
	public function __invoke(){
		$result = view('admin');
		$result -> subjects = DB::table('subject')
			->get();
		return $result;
	}
}