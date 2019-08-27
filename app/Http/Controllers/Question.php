<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util;
use Illuminate\Http\Request;

class Question
{
	public function insertReady(Request $request)
	{
		$result = view('newQuestion');
		$result -> data = DB::table('subject')
			->select('name')
			->addSelect('idx')
			->orderBy('idx')
		->get();
		return $result;
	}
	public function new(Request $request){
		foreach($request->all() as $key => $value){
			if($key == "_token") continue;
			$data[$key] = $value;
		}
		DB::table('question_choice')->insert($data);
		return redirect()->back()->withInput();
	}
	public function view(Request $request, $idx){
		if(DB::table('subject')->where('idx','=',$idx)->count() == 0)abort(404);
		$result = view('viewQuestion');
		$result -> subject = DB::table('subject')->select('name')->where('idx','=',$idx)->first()->name;
		DB::statement(DB::raw('set @row:=0'));
		$result -> questions = DB::table('question_choice')
			->selectraw('@row:=@row+1 as idx')
			->addSelect('title')
			->addSelect('answer')
			->addSelect('writer')
			->addSelect('choice_1')
			->addSelect('choice_2')
			->addSelect('choice_3')
			->addSelect('choice_4')
			->where('subject','=',$idx)
			->get();
		return $result;
	}
	public function solve(Request $request,$idx){
		if(DB::table('subject')->where('idx','=',$idx)->count() == 0)abort(404);
		$result = view('solveQuestion');
		DB::statement(DB::raw('set @row:=0'));
		$query = DB::table('question_choice')
			->addSelect('idx')
			->addSelect('title')
			->addSelect('choice_1')
			->addSelect('choice_2')
			->addSelect('choice_3')
			->addSelect('choice_4')
			->whereRaw('subject'.'='.$idx)
			->orderByRaw('rand()')
			->limit(10)
			->tosql();
		$result -> questions = DB::table(DB::raw("(".$query.") a"))
			->selectRaw('@row:=@row+1 as rownum')
			->addSelect('a.*')
			->get();
		$result -> subject = DB::table('subject')->select('name')->where('idx','=',$idx)->first()->name;
		return $result;
	}
	public function narNewReady(){
		$result = view('newNarrative');
		$result -> subjects = DB::table('subject')
			->orderBy('idx')
			->get();
		return $result;
	}
	public function newNar(Request $request){
		$data['subject'] = $request->input('subject');
		$data['writer'] = $request->input('writer');
		$data['title'] = $request->input('title');
		DB::table('question_narrative')->insert($data);
		$idx = DB::table('question_narrative')->max('idx');
		$data1 = Array();
		foreach($request->input('answer') as $answer){
			$temp['question'] = $idx;
			$temp['answer'] = $answer;
			array_push($data1,$temp);
		}
		DB::table('question_narrative_answers')->insert($data1);
		return redirect()->back()->withInput();
	}
}