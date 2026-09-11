<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Support\LogOptions;

class Warehouse extends Model
{
    use HasUuids;
    protected $fillable = [
        warehouse_code,
        warehouse_name, 
        address, 
        is_active
    ];

    public function getActivityLogOptions() : LogOptions {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
