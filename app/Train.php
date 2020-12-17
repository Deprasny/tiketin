<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'departure',
        'arrival',
        'from',
        'to',
        'price',
        'qty'
    ];
    public function ticket()
    {
        return $this->hasMany('App\Ticket');
    }
}
