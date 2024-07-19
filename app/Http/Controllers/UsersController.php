<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['status' => true, 'data' => $users], 200);
    }

    public function show(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = ['email' => $email, 'password' => $password];

        if (!auth()->attempt($credentials)) {
            return response()->json(['status' =>    false, 'message' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        return response()->json([
            'status' => true,
            'data' => $user,
        ], 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'nullable|string',
            'avatar' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'data' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'), 
            'avatar' => $request->input('avatar'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['status' => true, 'message' => 'User created successfully', 'data' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'phone' => $request->input('phone'),
            'avatar' => $request->input('avatar'), 
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'data' => $validator->errors()], 422);
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'avatar' => $request->input('avatar'), 
            'status' => $request->input('status'), 
        ]);

        return response()->json(['status' => true, 'message' => 'User updated successfully', 'data' => $user], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['status' => true, 'message' => 'User deleted successfully'], 200);
    }
}