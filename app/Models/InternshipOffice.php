<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipOffice extends Model
{
    protected $fillable = ['position', 'about', 'office_id'];

    /** @use HasFactory<\Database\Factories\InternshipOfficeFactory> */
    use HasFactory;

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}