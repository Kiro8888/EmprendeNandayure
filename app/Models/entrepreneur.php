<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use spatie
use Spatie\Permission\Traits\HasRoles;

class entrepreneur extends Model
{
       //use spatie
       use HasRoles;
       
    use HasFactory;
    protected $primaryKey = 'id_etp';

    protected $fillable = ['etp_name', 'etp_last_name','etp_latitude','etp_longitude', 'etp_status', 'etp_num', 'etp_email', 'etp_id_rol'];


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
