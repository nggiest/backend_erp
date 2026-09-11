<?php

use App\Models\Branch;

class CreateBranchAction{
    public function execute(array $data):Branch{
        return Branch::create($data);
    }
}
