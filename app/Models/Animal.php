<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
