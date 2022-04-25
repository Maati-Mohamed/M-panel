<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'websiteName',
        'email',
        'logo',
        'photo',
        'mainColor',
        'minerColor',
        'description',
        'phone',
        'address',
    ];

    public function getLogoImageAttribute()
    {
        return asset('photo/'.$this->logo);
            
    }
}
