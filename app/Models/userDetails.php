<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDetails extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'EmployeeId', 'section', 'department', 'subsection','PhoneNumber', 'email', 'userID'];


    public $incrementing = false;
    protected $primaryKey = 'userID';
    public function user()
    {
        return $this->belongsTo(User::class,'userID');
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
