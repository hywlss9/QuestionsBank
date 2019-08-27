<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<style>
			li{list-style:decimal}
			.col-md-10{    margin-bottom: 20px;}
		</style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Styles -->
        
    </head>
    <body>
		<div class="container">
			<h1 class="display-4 text-center">문제내기-객관식</h1>
			<form action="" method="post">
				<div class="row">
					@csrf
					<p class="col-md-2 col-xs-12 text-center">문제</p>
					<input type="text" name="title" class="col-md-10 col-xs-12">
					<p class="col-md-2 col-xs-12 text-center">출제자</p>
					<input type="text" name="writer" value="{{ old('writer') }}" class="col-md-10 col-xs-12">
					<p class="col-md-2 col-xs-12 text-center">정답</p>
					<input type="text" name="answer" class="col-md-10 col-xs-12"> 	
					<p class="col-md-2 col-xs-12 text-center">보기</p>
					<ul class="col-md-10 col-xs-12">
						<li><input type="text" name="choice_1" class="w-100"></li>
						<li><input type="text" name="choice_2" class="w-100"></li>
						<li><input type="text" name="choice_3" class="w-100"></li>
						<li><input type="text" name="choice_4" class="w-100"></li>
					</ul>
					<p class="col-md-2 col-xs-12 text-center">과목선택</p>
					<select name="subject" class="col-md-10 col-xs-12">
						<option value="">과목선택</option>
					  @foreach ($data as $subject)
						<option value="{{ $subject->idx }}" {{ old('subject') == $subject->idx ? "selected" : "" }}>{{ $subject->name }}</option>
					  @endforeach
					</select>
					<input type="submit" class="btn btn-primary col-md-12 col-xs-12">
				</div>
			</form>
		</div>
    </body>
</html>
