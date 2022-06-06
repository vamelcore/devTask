<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthLoginRequest;;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Show login form
     */
    public function login()
    {
        return view("auth.login");
    }

    /**
     * Process login form
     *
     * @param AuthLoginRequest $request
     */
    public function loginProcess(AuthLoginRequest $request)
    {
        $data = $request->only('email', 'password');
        if(auth("web")->attempt($data)) {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email" => "User not found"]);
    }

    /**
     * Process logout
     */
    public function logout()
    {
        auth("web")->logout();
        return redirect(route("login"));
    }

    /**
     * Show register form
     */
    public function register()
    {
        return view("auth.register");
    }

    /**
     * Process registration
     *
     * @param AuthRegisterRequest $request
     */
    public function registerProcess(AuthRegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'password');
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }
}
