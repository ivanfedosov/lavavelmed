<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

//TODO:
class CheckPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $user = $request->user();

        if ($user && !$this->checkIfUserIsPatient($request->user())) {
            abort(403, 'Forbidden');
        }

        $patient = $user->patient;

        return $next($request);
    }

    private function checkIfUserIsPatient(User $user): bool
    {
        return ($user->account_type === User::PATIENT);
    }
}
