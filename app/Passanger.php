<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passanger extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'no_identity',
        'name',
        'address',
        'number',
    ];

    public function ticket()
    {
        return $this->hasMany('App\Ticket');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
