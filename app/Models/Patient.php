<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['animal','race'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
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
