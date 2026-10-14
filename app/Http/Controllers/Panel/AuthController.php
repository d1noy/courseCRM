<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AuthRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @return Factory|View|\Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * @param AuthRequest $request
     * @return RedirectResponse
     */
    public function postLogin(AuthRequest $request)
    {
        if(auth()->attempt($request->validated() + ['is_admin' => true])){
            return redirect()->route('home');
        }

        return redirect()
            ->back()
            ->withInput($request->validated())
            ->withErrors(['email' => 'Неверный адрес электронной почты или пароль.']);
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
