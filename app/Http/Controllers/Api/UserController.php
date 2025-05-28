<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
 public function index() {
        return User::with('rol')->get();
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function show(User $user) {
        return $user->load('rol');
    }

    public function update(Request $request, User $user) {
        $user->update($request->except('password'));
        return $user;
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->noContent();
    }
}
