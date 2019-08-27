<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<style>
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <h1 class="display-4 text-center">ADMIN</h1>
				<div class="row">
					<div class="show_question col-md col-xs-12 float-left">
						<h3 class="font-weight-bold text-center">문제보기(객관식)</h3>
					  @foreach ($subjects as $subject)
						<div class="row">
							<a href="/viewQuestion/{{ $subject->idx }}" class="col">{{ $subject->name }}</a>
						</div>
					  @endforeach
					</div>
					<div class="show_question col-md col-xs-12 float-right">
						<h3 class="font-weight-bold text-center">어드민 전용</h3>
						<div class="row">
							<a href="/newQuestion" class="col">문제내기(객관식)</a>
							<a href="/newNarrative" class="col">문제내기(주관식)</a>
						</div>
						<div class="row">
							<a href="/newSubject" class="col">과목추가</a>
						</div>
					</div>
				</div>
            </div>
        </div>
    </body>
</html>
