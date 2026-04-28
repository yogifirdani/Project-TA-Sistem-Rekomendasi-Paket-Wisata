<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'user');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(15)->withQueryString();

        return view('admin.user_profile.index', compact('users'));
    }

    public function show(User $user)
    {
        // Pastikan bukan admin
        abort_if($user->role === 'admin', 403);

        return view('admin.user_profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if($user->role === 'admin', 403);

        return view('admin.user_profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        abort_if($user->role === 'admin', 403);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('admin.user-profile.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        abort_if($user->role === 'admin', 403);

        $user->delete();

        return redirect()->route('admin.user-profile.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
