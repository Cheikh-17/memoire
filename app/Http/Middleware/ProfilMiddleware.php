<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfilMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $profil
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $profil = null)
    {
        // Vérifie si l'utilisateur est authentifié
        if ($request->user()) {
            // Si un profil est spécifié et ne correspond pas, retourne une erreur
            if ($profil && $request->user()->profil !== $profil) {
                return response('Unauthorized.', 403);
            }

            // Empêche l'accès à la page de connexion si l'utilisateur est déjà connecté
            if ($request->route()->getName() === 'login') {
                return redirect('/home'); // Redirige vers une autre page (par exemple, tableau de bord)
            }
        }

        return $next($request);
    }
}
