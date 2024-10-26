<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'EmployeeId',
        'section',
        'department',
        'subsection',
        'PhoneNumber',
        'email',
        'userID'
    ];

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'userID';
    protected $table = 'user_details';



    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }



    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class, 'EmployeeId', 'EmployeeId');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
