<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConvertDateFormat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Chuyển đổi định dạng ngày nếu có
        if ($request->has('manufacture_date')) {
            $manufactureDate = \DateTime::createFromFormat('d/m/Y', $request->input('manufacture_date'));
            if ($manufactureDate) {
                $request->merge(['manufacture_date' => $manufactureDate->format('Y-m-d')]);
            }
        }

        if ($request->has('expiry_date')) {
            $expiryDate = \DateTime::createFromFormat('d/m/Y', $request->input('expiry_date'));
            if ($expiryDate) {
                $request->merge(['expiry_date' => $expiryDate->format('Y-m-d')]);
            }
        }

        return $next($request);
    }
}
