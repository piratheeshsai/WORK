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
        'recommender_id'
    ];


public function userDetails()
{
    return $this->belongsTo(UserDetail::class, 'EmployeeId', 'EmployeeId');
}
public function recommender() {
    return $this->belongsTo(User::class, 'recommender_id', 'userID');
}

}
