<?php

namespace App\Policies;

use App\Models\Shipment;
use App\Models\User;

class ShipmentPolicy
{
    /**
     * Determine whether the user can view the shipment creation page.
     */
    public function canViewCreationPage(User $user): bool
    {
        return $user->role === User::ROLE_ADMINISTRATOR;
    }

    /**
     * Determine whether the user can create shipments.
     */
    public function create(User $user): bool
    {
        return $user->role === User::ROLE_ADMINISTRATOR;
    }

    /**
     * Determine whether the user can view any shipments.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the shipment.
     */
    public function view(User $user, Shipment $shipment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the shipment.
     */
    public function update(User $user, Shipment $shipment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the shipment.
     */
    public function delete(User $user, Shipment $shipment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the shipment.
     */
    public function restore(User $user, Shipment $shipment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the shipment.
     */
    public function forceDelete(User $user, Shipment $shipment): bool
    {
        return false;
    }
}
