<?php

namespace App\Policies;

use App\Models\DeliveryCost;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeliveryCostPolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function view(User $user, DeliveryCost $deliveryCost): bool
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

    public function update(User $user, DeliveryCost $deliveryCost): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function delete(User $user, DeliveryCost $deliveryCost): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function restore(User $user, DeliveryCost $deliveryCost): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function forceDelete(User $user, DeliveryCost $deliveryCost): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }
}
