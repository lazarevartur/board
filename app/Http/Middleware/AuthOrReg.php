<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthOrReg
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
        //Получаем email и pass юзера
        $user = $request->only(['email', 'password']);
        //Если пользователя нет, то регистрируем и сразу входим
        if (!Auth::attempt($user)) {
            $this->create(['email' => $user['email'], 'password' => $user['password']]);
            Auth::attempt($user);
        }
        return $next($request);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['email'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
