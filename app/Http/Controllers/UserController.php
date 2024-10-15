<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function assignRole(Request $request, User $user)
    {
        $role = $request->input('role');
        $user->assignRole($role);

        return response()->json(['message' => 'Role assigned successfully!']);
    }
}
