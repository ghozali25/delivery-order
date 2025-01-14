<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VehicleType;
use Illuminate\Auth\Access\Response;

class VehicleTypePolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function view(User $user, VehicleType $vehicleType): bool
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

    public function update(User $user, VehicleType $vehicleType): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function delete(User $user, VehicleType $vehicleType): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function restore(User $user, VehicleType $vehicleType): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function forceDelete(User $user, VehicleType $vehicleType): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }
}
