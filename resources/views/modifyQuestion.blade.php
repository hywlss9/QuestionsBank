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
        <!-- Styles -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
		<div class="container">
			@csrf
			<h1 class="display-4 text-center">문제수정</h1>
			<form action="" method="post">
				<div>
				  @foreach ($questions as $question)
					<div class="row">
						<p class="col font-weight-bold">문제 : </p>
						<input type="text" name="" value={{ $question->title }}>
						<div class="w-100"></div>
						<p class="col">정답 : </p>
						<input type="text" name="" value={{ $question->answer }}>
						<div class="w-100"></div>
						<p class="col">출제자 : </p>
						<input type="text" name="" value={{ $question->writer }}>
						<div class="w-100"></div>
							<ul>
								<li class="col"><p> <input type="text" name="" value={{ $question->choice_1 }}></p></li>
								<li class="col"><p> <input type="text" name="" value={{ $question->choice_2 }}></p></li>
								<li class="col"><p> <input type="text" name="" value={{ $question->choice_3 }}></p></li>
								<li class="col"><p> <input type="text" name="" value={{ $question->choice_4 }}></p></li>
							</ul>
					</div>
				  @endforeach
				  <div class="row>
					<input type="submit" value="수정하기" class="btn btn-primary">
					<input type="button" value="인덱스로" onclick="location.href="/" class="btn btn-secondary">
				  </div>
				</div>
			</form>
		</div> 
    </body>
</html>