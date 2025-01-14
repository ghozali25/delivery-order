<?php

namespace App\Policies;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DriverPolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function view(User $user, Driver $driver): bool
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

    public function update(User $user, Driver $driver): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function delete(User $user, Driver $driver): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function restore(User $user, Driver $driver): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function forceDelete(User $user, Driver $driver): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }
}
