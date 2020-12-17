<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_booking',
        'user_id',
        'passanger_id',
        'train_id',
        'date',
        'seat',
    ];

    public function passanger()
    {
        return $this->belongsTo('App\Passanger');
    }
    public function train()
    {
        return $this->belongsTo('App\Train');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
