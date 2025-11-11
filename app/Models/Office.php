<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'location', 'description'];

    /** @use HasFactory<\Database\Factories\OfficeFactory> */
    use HasFactory;

    public function internshipOffices()
    {
        return $this->hasMany(InternshipOffice::class);
    }
}