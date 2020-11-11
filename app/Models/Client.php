<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','lastname','age','phone'];

    public function turns()
    {
        return $this->hasMany('App\Models\Turn');
    }
}
