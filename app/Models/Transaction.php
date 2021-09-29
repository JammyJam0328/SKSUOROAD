<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    public function proofofpayments()
    {
        return $this->hasMany(Proofofpayment::class);
    }
}
