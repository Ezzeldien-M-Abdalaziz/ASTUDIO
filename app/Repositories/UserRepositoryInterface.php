<?php

namespace App\Repositories;

use App\Models\Job;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function findByEmail(string $email): ?User;
    public function findByName(string $name): ?User;

    public function logout() : void;

}
