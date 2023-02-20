<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
 
    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $password = Hash::make($data['password']);
        return User::create([
            'username' => $data['username'],
            'password' => $password,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return 204;
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();
        if(!$user) {
            return response()->json(['message' => 'Invalid email'],401);
        }
        $isValidPassword = Hash::check($password, $user->password);
        if(!$isValidPassword) {
            return response()->json(['message' => 'Invalid password'],401);
        }

        return response()->json($user);
    }
}
