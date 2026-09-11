<?php

namespace App\Models\Branch;
use App\Models\Branch;
class DeleteBranchAction{
    public function execute(Branch $branch):bool{
        return $branch->delete();

    }
}