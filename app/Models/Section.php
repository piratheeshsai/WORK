<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section'; // Use the correct table name
    protected $fillable = ['name']; // Define the fillable columns

    // Define the relationship with Subsection
    public function subsections()
    {
        return $this->hasMany(subsections::class, 'section_id');
    }
}
