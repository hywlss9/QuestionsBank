<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next,$mode)
    {
        if(session()->has('user_id') xor $mode){
			if($mode){
				echo "<script>alert('로그인 해라')</script>";
			}else{
				echo "<script>alert('로그인 왜 또하냐')</script>";
			}
			exit();
		}
        return $next($request);
    }

}