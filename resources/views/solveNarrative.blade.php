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
			<h1 class="display-4 text-center">문제풀기</h1>
			<div>
			  @foreach ($questions as $question)
				<?
				$choices = array($question->choice_1,$question->choice_2,$question->choice_3,$question->choice_4);
				?>
				{{ $question->rownum }}번  {{ $question->title }}
				<ul class="choice" alt="{{$question->idx}}">
				  @for($i = 3 ; $i >= 0 ; $i --)
					<?$rand = mt_rand(0,$i);?>
					<li alt="{{ $i }}">{{ $choices[$rand] }}</li>
					<?array_splice($choices,$rand,1);?>
  				  @endfor
				</ul>
			  @endforeach
			</div>
		</div> 
    </body>
	<script>
		$('.choice>li').click(function(){
			var formdata = new FormData();
			formdata.append('mode','solve1');
			formdata.append('idx',$(this).eq(0).parent().attr("alt"));
			formdata.append('answer',$(this).attr('alt'));
			$.ajax({
				url:'/ajax',
				data:formdata,
				type:'GET',
				dataType:'json',
				processData: false,
				success : function(data) {
					console.log('실패')
					console.log(data)
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log('성공')
					console.log(jqXHR.responseText)
				}
			});
		});
	</script>
</html>
