<?php

namespace App\Http\Middleware;

use Closure;
use Slugify;
class ValidarDepartamento
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
       $data=$request->json()->all();
       if (isset($data['nome'])) {
         if (!isset($data['id'])) {
           $data['id'] = Slugify::slugify($data['nome']);
         }
         $request->{'departamento_data'} = $data;
        return $next($request);
       }else{
        abort(400);
       }
    }
}
