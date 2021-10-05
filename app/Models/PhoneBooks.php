<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'number',
    ];


    public function orderedByFirstName(){
        return PhoneBooks::orderBy('name', 'asc')->get();
    }
}
