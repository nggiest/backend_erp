<?php

use App\Models\Warehouse;

class CreateWarehouseAction{
    public function execute(array $data):Warehouse{
        return Warehouse::create($data);
    }
}
