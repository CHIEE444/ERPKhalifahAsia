<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'referral_code',
        'city',
        'package',
        'duration',
        'date',
        'room_type',
        'note',
        'status' 
    ];
public function user()
{
    return $this->belongsTo(User::class, 'referral_code', 'referral_code');
}

}
