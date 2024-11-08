<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gedung() {
        return $this->hasMany(User::class);
    }

    public function park() {
        return $this->hasMany(Parking::class);
    }
}
