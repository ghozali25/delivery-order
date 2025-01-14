<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF' ||
            $user->role->abbreviation === 'CLN';
    }

    public function view(User $user, Order $order): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF' ||
            ($user->role->abbreviation === 'CLN' && $user->client->id === $order->id_client);
    }

    public function create(User $user): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF' ||
            $user->role->abbreviation === 'CLN';
    }

    public function update(User $user, Order $order): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function delete(User $user, Order $order): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF' ||
            ($user->role->abbreviation === 'CLN' && $user->client->id === $order->id_client && !$order->confirmed);
    }

    public function restore(User $user, Order $order): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF';
    }

    public function forceDelete(User $user, Order $order): bool
    {
        return
            $user->role->abbreviation === 'ADMIN' ||
            $user->role->abbreviation === 'STAFF' ||
            ($user->role->abbreviation === 'CLN' && $user->client->id === $order->id_client && !$order->confirmed);
    }
}
