<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments'; // Use the correct table name
    protected $fillable = ['subsections_id', 'name']; // Define the fillable columns

    // Define the relationship to subsections if needed
    public function subsection()
    {
        return $this->belongsTo(Subsection::class, 'subsections_id');
    }
}
