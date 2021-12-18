<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['imie','nazwisko','login', 'haslo','typ','telefon','wyksztalcenie','adres_z','adres_k'];
}
