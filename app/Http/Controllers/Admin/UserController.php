<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if ($user->id !== Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return back();
        } else {
            return back()->with('error', 'Запрещено менять собственную роль');
        }

    }

    public function create() {}
    public function store(Request $request) {}
    public function show(User $user) {}
    public function edit(User $user) {}
    public function update(Request $request, User $user) {}
    public function destroy(User $user) {}
}
