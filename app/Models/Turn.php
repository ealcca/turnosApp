<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;

    protected $fillable = ['date','time','done','client_id'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
