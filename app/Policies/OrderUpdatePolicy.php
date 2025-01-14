<?php

namespace App\Policies;

use App\Models\OrderUpdate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderUpdatePolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function view(User $user, OrderUpdate $orderUpdate): bool
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

    public function update(User $user, OrderUpdate $orderUpdate): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function delete(User $user, OrderUpdate $orderUpdate): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function restore(User $user, OrderUpdate $orderUpdate): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function forceDelete(User $user, OrderUpdate $orderUpdate): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }
}
