<?php

namespace App\Models\Warehouse;

use App\Models\Warehouse;
class DeleteWarehouseAction{
    public function execute(Warehouse $warehouse):bool{
        return $warehouse->delete();

    }
}