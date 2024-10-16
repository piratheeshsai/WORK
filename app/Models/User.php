<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userID',
        'name',
        'email',
        'password',
        'role'
    ];



    protected $primaryKey = 'userID';

 // This ensures Laravel uses userID as the primary key.

    // If the userID is not an integer, add the following:
    protected $keyType = 'string';

    // Disable auto-increment if userID is not auto-incremented
    public $incrementing = false;
    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }
    public function userDetails()
{
    return $this->hasOne(UserDetail::class, 'userID', 'userID');
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subsections()
    {
        return $this->hasMany(Subsection::class, 'recommender_id', 'userID');
    }
    public static function getRecommenders()
    {
        return self::where('role', 'recommender')->get();
    }

}
