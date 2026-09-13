<?php

// app/Policies/BranchPolicy.php
namespace App\Policies;

use App\Enums\RoleStatusType;
use App\Models\Branch;
use App\Models\User;

class BranchPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole(RoleStatusType::ADMIN, RoleStatusType::OWNER)) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->hasRole(
            RoleStatusType::SPV_BRANCH,
            RoleStatusType::STAFF_BRANCH,
            RoleStatusType::FINANCE,
            RoleStatusType::HR
        );
    }

    public function view(User $user, Branch $branch): bool
    {
        return $user->hasRole(
            RoleStatusType::SPV_BRANCH,
            RoleStatusType::STAFF_BRANCH,
            RoleStatusType::FINANCE,
            RoleStatusType::HR
        );
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Branch $branch): bool
    {
        return $user->hasRole(RoleStatusType::SPV_BRANCH);
    }

    public function delete(User $user, Branch $branch): bool
    {
        return false;
    }
}