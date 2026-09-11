<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Http\Requests\StoreWarehouseRequest;
use App\Models\Warehouse;
use CreateWarehouseAction;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    use ApiResponse;
    public function index(){
        $warehouses = Warehouse::all();

        return $this->successResponse($warehouses);
    }

    public function show(Warehouse $warehouse){
        // $this->authorize("view", $warehouse);
        return $this->successResponse($warehouse);
    }

    public function store(StoreWarehouseRequest $request, CreateWarehouseAction $action){
        $warehouse = $action->execute($request->validated());
        return $this->successResponse($warehouse, 'Data gudang berhasil dibuat', 201);
    }
}
