<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $postUserID = Post::where('id', '=', $request->route('id'))->first()->user_id;
        $userRole = User::with('roles')->where('id', '=', $postUserID)->first();

        if (Auth::check()) {
            foreach(Auth::user()->roles as $role) {
                if($role->name === 'Admin') {
                    return $next($request);
                } elseif ($role->name === 'Moderator') {
                    foreach($userRole->roles as $userRole) {
                        if($userRole->id === Auth::user()->id) {
                            return $next($request);
                        }
                        else {
                            return response()->json(
                                [
                                    'success' => false,
                                    'message' => 'You do not have Administrator permissions.'
                                ], 401
                            );
                        }
                    }
                }
                else {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'You do not have Administrator permissions.'
                        ], 401
                    );
                }
            }
        }
    }
}
