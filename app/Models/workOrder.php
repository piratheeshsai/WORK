<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workOrder extends Model
{
    use HasFactory;

    protected $table = 'work_order';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'id',
        'work_type',
        'priority',
        'complain',
        'EmployeeId',
    ];


public function userDetails()
{
    return $this->belongsTo(UserDetails::class, 'EmployeeId', 'EmployeeId');
}
}
