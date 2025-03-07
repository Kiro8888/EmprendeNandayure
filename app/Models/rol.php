<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rol extends Model
{
    use HasFactory;

    public function users(): HasMany {
        return $this->hasMany(User::class, 'usr_id_rol');
    }

    public function entrepreneurs(): HasMany {
        return $this->hasMany(Entrepreneur::class, 'etp_id_rol');
    }

    public function events(): HasMany {
        return $this->hasMany(Event::class, 'evt_id_rol');
    }
}
