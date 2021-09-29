<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function documents()
    {
        return $this->belongsToMany(Document::class,'request_documents')->withPivot('number_of_pages','id','total_amount','withAuth','copies','docx_status');
    }
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}