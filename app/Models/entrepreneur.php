<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class entrepreneur extends Model
{
    use HasFactory;




    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'etp_id_rol');
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class, 'pdt_id_etp');
    }

    public function services(): HasMany {
        return $this->hasMany(Service::class, 'srv_id_etp');
    }
}
