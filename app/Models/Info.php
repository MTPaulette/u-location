<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'logo',
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

        'about_mission',
        'about_choose',

        'contact_title',
        'contact_subtitle',
        
        'equipe1',
        'equipe2',
        'equipe3',
        'equipe4',

        'newsletter_title',
        'newsletter_subtitle',
    ];
}