<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Eager load roles so each user has their roles available
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        /**
         * Validate only the fields we want to allow updating.
         * Roles are excluded to prevent accidental privilege changes.
         * Address fields are included so they can be stored safely.
         */
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'max:255'],
            'address_line1' => ['nullable', 'string', 'max:255'],
            'address_line2' => ['nullable', 'string', 'max:255'],
            'city'          => ['nullable', 'string', 'max:255'],
            'postcode'      => ['nullable', 'string', 'max:20'],
            'country'       => ['nullable', 'string', 'max:100'],
        ]);

    // Update the user with validated data
    $user->update($validated);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'User details updated successfully!');
}

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
                        ->with('success', 'User deleted successfully!');
    }

}