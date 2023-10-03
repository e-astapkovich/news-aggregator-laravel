<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->paginate(10);
        return view('admin.users.index')
            ->with(['users' => $users]);
    }

    public function toggleRole(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back();
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, User $user) {}
    public function destroy(string $id) {}
}
