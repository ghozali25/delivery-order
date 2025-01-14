<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function view(User $user, User $model): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function create(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function update(User $user, User $model): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function delete(User $user, User $model): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function restore(User $user, User $model): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function forceDelete(User $user, User $model): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }
}
