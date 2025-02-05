<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIdsValid
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');

        if ($id && (!is_numeric($id) || $id <= 0 || (int)$id != $id)) {
            return response()->json([
                'success' => false,
                'message' => 'El ID debe ser un número entero positivo.'
            ], 400);
        }
        
        return $next($request);
    }
}
