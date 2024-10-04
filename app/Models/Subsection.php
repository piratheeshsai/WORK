<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsection extends Model
{
    use HasFactory;

    protected $table = 'subsections'; // Correct table name
    protected $fillable = [
        'section_id',
        'name',
        'section_head'
    ]; // Define the fillable columns

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
}
