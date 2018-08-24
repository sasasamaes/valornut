<?php namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminUser {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $type = User::find($request->user()->id)->AccountDetails->type;
        if ($type != 'a')
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('/');
            }
        }

        return $next($request);
	}

}
