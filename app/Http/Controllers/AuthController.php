<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(Request $request) {

       $fields = $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|unique:users,email',
           'password' => 'required|string',
       ]);

       $user = User::create([
           'name' => $fields['name'],
           'email' => $fields['email'],
           'password' => bcrypt($fields['password']),
       ]);

       $tokenName = $request->input('nameToken', 'default-token-name');
       $token = $user->createToken($tokenName)->plainTextToken;

       $response = [
           'user' => $user
       ];
       return response($response, 201);
   }

   public function login(Request $request) {

       $fields = $request->validate([
          'email' => 'required|string',
          'password' => 'required|string'
       ]);

       $user = User::where('email', $fields['email'])->first();

       if(!$user || !Hash::check($fields['password'], $user->password)) {
           return response([
               'message' => 'Credenciais invalidas',
           ], 401);
       }

       $token = $user->createToken('UsuarioLogado')->plainTextToken;

       $response = [
           'user' => $user,
           'token' => $token
       ];

       return response($response, 201);
   }


   public function logout(Request $request) {
       auth()->user()->tokens()->delete();
       return response([
           'message' => 'Deslogado com sucesso'
       ], 200);
   }
}
