<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<style>
			li{list-style:decimal}
			.choice li{
				cursor:pointer;
			}
			.col-md-10{    margin-bottom: 20px;}
		</style>
        <!-- Fonts -->
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/theeluwin/NotoSansKR-Hestia@master/stylesheets/NotoSansKR-Hestia.css"
        integrity="sha384-zGzb8nSrN9lm5PPcfztVC5DjjTs5sVStV85IH8x51fM9yIwmI+Uvh3RZDJlrpPWQ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/css/question.css">

    </head>
    <body>
        <main>
            <header><h1><a href="/"><span class="title">QBANK</span></a> <span class="subject">{{ $subject }}</span></h1></header>
            <section class="qs">
                <div class="container">
                    @foreach ($questions as $question)
                        <div class="questionContainer">
                            <div class="questionNumber">
                                {{ $question->rownum }}번  
                            </div>
                            <div class="questionText">
                                <p>
                                    {{ $question->title }}
                                </p>
                            </div>
                            <div class="questionChoice">
                                <ul class="choice" alt="{{$question->idx}}">
                                    <li value="1">{{ $question->choice_1 }}</li>
                                    <li value="2">{{ $question->choice_2 }}</li>
                                    <li value="3">{{ $question->choice_3 }}</li>
                                    <li value="4">{{ $question->choice_4 }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="reload">
                        <div class="text">
                        다른 문제 풀기
                        </div>
                    </div>
                </div>

            </section>
        </main>



        <!-- <div class="container">
			<h1 class="display-4 text-center">문제풀기</h1>
			<div>
			  @foreach ($questions as $question)
				{{ $question->rownum }}번  {{ $question->title }}
				<ul class="choice" alt="{{$question->idx}}">
					<li value="1">{{ $question->choice_1 }}</li>
					<li value="2">{{ $question->choice_2 }}</li>
					<li value="3">{{ $question->choice_3 }}</li>
					<li value="4">{{ $question->choice_4 }}</li>
				</ul>
			  @endforeach
			</div>
        </div>  -->
    </body>
	<script>
    var solvedQuestions = new Array();
            $('.reload').click(function(){
                location.href=location.href;
            })
		$('.choice>li').click(function(){
			var parent = $(this).eq(0).parent()
			if(solvedQuestions.indexOf(parent.attr("alt")) != -1)return;
			solvedQuestions[solvedQuestions.length] = parent.attr("alt");
			var target = $(this);
			$.ajax({
				url:`/ajax/solve?idx=${parent.attr("alt")}&answer=${target.attr('value')}`,
				type:'GET',
				dataType:'json',
				processData: false,
				success : function(data) {
					if(target.attr('value') == data.answer){
						target.addClass('correct');
					}else{
						target.addClass('wrong');
						console.log(data.answer);
						parent.children('li').eq(data.answer-1).addClass('correct');
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseText)
				}
			});
		});
	</script>
</html>
