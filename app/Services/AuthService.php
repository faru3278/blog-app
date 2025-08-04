<?php

namespace App\Services;
use App\Models\User;

class AuthService
{
    public function checkUserExists(string $email): bool
    {
        return User::where('email', $email)->exists();
    }

    public function createUser(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'user', // Default role, can be changed later
        ]);
    }
}
