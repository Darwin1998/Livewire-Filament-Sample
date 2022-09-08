<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','address' ,'payment_method','installation_date', 'amount', 'image', 'full_name'];

   

    // public function getFullDetailsAttribute()
    // {
    //     return "{$this->address} {$this->payment_method}";
    // }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
