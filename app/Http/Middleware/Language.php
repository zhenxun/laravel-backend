<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
//use App\Models\Setting;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $langArr = array('en', 'zh-cn', 'zh-tw');
        if(Session::has('backend-locale')){

            $locale = Session::get('backend-locale', Config::get('app.locale'));

        }else{

            $prefer_language = explode("," , Request::server('HTTP_ACCEPT_LANGUAGE'));
       
            if(!empty($prefer_language[0])){
                if(in_array(strtolower($prefer_language[0]), $langArr)){
                    $locale = (strtolower($prefer_language[0]) == 'zh-cn')? 'cn':$prefer_language[0];
                }else{
                    $locale = 'zh-tw';
                }
            }else{
                $locale = 'zh-tw';
            }
        }

        App::setLocale($locale);

        return $next($request);
    }
}
