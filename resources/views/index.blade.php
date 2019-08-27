<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<style>
		</style>
        <!-- Fonts -->
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/theeluwin/NotoSansKR-Hestia@master/stylesheets/NotoSansKR-Hestia.css"
        integrity="sha384-zGzb8nSrN9lm5PPcfztVC5DjjTs5sVStV85IH8x51fM9yIwmI+Uvh3RZDJlrpPWQ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/index.css">
		<!-- Styles -->
        
    </head>
    <body>
        <main>
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
<!-- ATJSH -->
                <header>
					<h1>QBANK</h1>
					<a href="https://onedrive.live.com/edit.aspx?cid=15519e289c79c13b&page=view&resid=15519E289C79C13B!15809&parId=15519E289C79C13B!103&app=Excel&wacqt=sharedby"><h1>노리터 가기</h1></a>
				</header>
                <section class="hero_links">
                    <div class="container">
                        <div class="links_container">
                            <h2>객관식</h2>
                            @foreach ($subjects as $subject)
                            <div class="link">
                                <span class="link_name">{{ $subject->name }}</span>
                                <div class="link_contain">
                                    <a href="/solveQuestion/{{ $subject->idx }}" class="solve">풀기</a>
                                    <a href="/viewQuestion/{{ $subject->idx }}" class="view">보기</a>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <div class="links_container">
                            <h2>주관식</h2>
                            @foreach ($subjects as $subject)
                            <div class="link">
                                <span class="link_name">{{ $subject->name }}</span>
                                <div class="link_contain">
                                    <a href="/solveNarrative/{{ $subject->idx }}" class="solve">풀기</a>
                                    <a href="/viewNarrative/{{ $subject->idx }}" class="view">보기</a>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <footer>
                    DESIGNED BY ATJSH
                </footer>

<!-- ATJSH  -->
        </main>
    </body>
</html>
