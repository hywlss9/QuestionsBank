<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util;

class Ajax
{
	public function solve(Request $request){
		$data['question'] = $request->input('idx');
		$data['answer'] = $request->input('answer');
		DB::table('question_solve_log')->insert($data);
		$answer = DB::table('question_choice')
			->select('answer')
			->where('idx','=',$request->input('idx'))
			->first()->answer;
		return response()->json(['answer' => $answer, 'state' => 'CA']);
	}
}