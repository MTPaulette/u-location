<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'telephone1',
        'telephone2',
        'telephone3',

        'email',

        'address1',
        'address2',
        'address3',

        'period',
        'whatsapp',
        'facebook',

        'about_title',
        'about_subtitle',

        'contact_title',
        'contact_subtitle',

        'newsletter_title',
        'newsletter_subtitle',
    ];
}