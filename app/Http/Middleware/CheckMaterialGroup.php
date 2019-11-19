<?php

namespace App\Http\Middleware;

use App\Models\MaterialGrupa;
// use \Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
// use Illuminate\Http\Response;
use Closure;

class CheckMaterialGroup
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
        $request->headers->set('Accept', 'application/json');
        // $http_foundation_factory = new HttpFoundationFactory();
        if($request->group){
            // $resp = ['status'=>'error', 'message'=>'dawd'];
            // $laravel_response = $http_foundation_factory->createResponse($resp);
            // return $laravel_response;
            abort(403, 'Access denied');
        }
        return $next($request);
    }
}
