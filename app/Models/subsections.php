<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsections extends Model
{
    protected $table = 'subsections'; // Use the correct table name
    protected $fillable = ['section_id', 'name']; // Define the fillable columns

    // Define the relationship to the sections if needed
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
