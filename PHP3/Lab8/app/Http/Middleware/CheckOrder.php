<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $reponse = $next($request);
        
        $user = Auth::user();
        $orderExist = Order::where('user_id', $user->id)->where('id', $request->idOrder)->exists();
        if(!$orderExist){
            abort(403, "Ê, đơn này hàng này ko phải của chú!");
        }

        return $reponse;
    }
}
