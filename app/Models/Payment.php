<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['client_id', 'date','amount' ,'status','received_by', 'payment_mode'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}