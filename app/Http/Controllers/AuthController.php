<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\json;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenziali non valide'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
