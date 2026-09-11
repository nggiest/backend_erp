<?php

use App\Models\Warehouse;


class UpdateWarehouseAction{
    public function execute(Warehouse $warehouse, array $data): Warehouse{
        $warehouse->update($data);
        return $warehouse;
    }
}