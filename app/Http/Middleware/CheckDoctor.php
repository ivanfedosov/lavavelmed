<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckDoctor
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

        if ($user && !$this->checkIfUserIsDoctor($user)) {
            //TODO:
            abort(403, 'Forbidden');
        }

        $doctor = $user->doctor;

        return $next($request);
    }

    private function checkIfUserIsDoctor(User $user): bool
    {
        return ($user->account_type === User::DOCTOR);
    }
}
