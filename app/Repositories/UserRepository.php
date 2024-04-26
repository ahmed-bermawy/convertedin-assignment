<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getDetail(int $id)
    {
        return User::find($id);
    }

    public function getAdmins()
    {
        return User::where('is_admin', true)->get();
    }

    public function getUsers()
    {
        return User::where('is_admin', false)->get();
    }
}