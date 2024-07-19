<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'dpi', 'name', 'last_name', 'phone', 'is_active', 'latitude',
         'longitude','img','address'
    ];
    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
