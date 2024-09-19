<?php

namespace App\Policies;

use App\Models\Location;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LocationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view location')
            ? Response::allow()
            : Response::deny('You do not have permission to view locations.');
    }

    public function view(User $user, Location $location)
    {
        return $user->can('view location')
            ? Response::allow()
            : Response::deny('You do not have permission to view this location.');
    }

    public function create(User $user)
    {
        return $user->can('create location')
            ? Response::allow()
            : Response::deny('You do not have permission to create a location.');
    }

    public function update(User $user, Location $location)
    {
        return $user->can('edit location')
            ? Response::allow()
            : Response::deny('You do not have permission to update this location.');
    }

    public function delete(User $user, Location $location)
    {
        return $user->can('delete location')
            ? Response::allow()
            : Response::deny('You do not have permission to delete this location.');
    }
}
