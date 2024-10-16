<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsection extends Model
{
    use HasFactory;

    protected $table = 'subsections'; // Correct table name
     // Define the fillable columns
    protected $fillable = ['name', 'section_head', 'section_id', 'recommender_id'];

    // Relationship to Section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    // Relationship to Department
    public function departments()
    {
        return $this->hasMany(Department::class, 'subsections_id');
    }

    public function recommender()
    {
        return $this->belongsTo(User::class, 'recommender_id', 'userID');
    }
}
