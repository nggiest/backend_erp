<?php

// app/Policies/BranchPolicy.php
namespace App\Policies;

use App\Enums\EnumRoleStatus;
use App\Models\Branch;
use App\Models\User;

class BranchPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole(EnumRoleStatus::ADMIN, EnumRoleStatus::OWNER)) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->hasRole(
            EnumRoleStatus::SPV_BRANCH,
            EnumRoleStatus::STAFF_BRANCH,
            EnumRoleStatus::FINANCE,
            EnumRoleStatus::HR
        );
    }

    public function view(User $user, Branch $branch): bool
    {
        return $user->hasRole(
            EnumRoleStatus::SPV_BRANCH,
            EnumRoleStatus::STAFF_BRANCH,
            EnumRoleStatus::FINANCE,
            EnumRoleStatus::HR
        );
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Branch $branch): bool
    {
        return $user->hasRole(EnumRoleStatus::SPV_BRANCH);
    }

    public function delete(User $user, Branch $branch): bool
    {
        return false;
    }
}