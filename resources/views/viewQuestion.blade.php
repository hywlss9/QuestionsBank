<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<style>
			li{list-style:decimal}
			.show_question{
				border:1px dashed black;
			}
			a{text-align:center}
		</style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Styles -->
        
    </head>
    <body>
		<div class="container">	
		 <button type="button" class="btn btn-secondary" onclick="location.href='/'" style="float:left;">INDEX</button>
		 <h1 class="display-4 text-center">{{ $subject }}</h1>
		  @foreach ($questions as $question)
			<div class="row">
				<p class="col font-weight-bold">{{ $question->idx }}. {{ $question->title }}</p>
				<div class="w-100"></div>
				<p class="col">정답 : {{ $question->answer }} 출제자 : {{ $question->writer }}</p>
				<div class="w-100"></div>
					<ul>
						<li class="col"><p> {{ $question->choice_1 }}</p></li>
						<li class="col"><p> {{ $question->choice_2 }}</p></li>
						<li class="col"><p> {{ $question->choice_3 }}</p></li>
						<li class="col"><p> {{ $question->choice_4 }}</p></li>
					</ul>
			</div>
		  @endforeach
		</div>
    </body>
</html>
