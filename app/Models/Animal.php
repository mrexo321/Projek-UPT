<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    

    public function pasiens()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}
