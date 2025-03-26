<?php

namespace App\Repositories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function findByName(string $name): ?User
    {
        return User::where('name', $name)->first();
    }

    public function logout(): void{
        $User = Auth::user();
        $User->tokens()->delete();
    }


}
