<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function register(Request $request)
    {
        if (Auth::attempt($request->all())) {
            return response()->json([
                'message' => 'Пользователь уже создан',
            ], 401);
        }
        $user = User::create([
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
        ]);
        Auth::login($user);
        $token = $user->createToken('auth_token');
        return response()->json([
            'message' => 'Вы успешно зарегистрировались',
            'content' => $token->plainTextToken,
        ], 200);
    }
    public function getme()
    {
        return response()->json([
            'message' => 'Данные о пол-ле',
            'content' => Auth::user()
        ]);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->all())) {
            return response()->json([
                'message' => 'Неверные данные',
            ], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Вы успешно вошли',
            'content' => $token,
        ], 200);
    }
    public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();
        return response()->json([
            'message' => 'Вы вышли'
        ], 200);
    }
}
