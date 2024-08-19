<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class event extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_evt';

    protected $fillable = ['evt_name', 'evt_description','evt_date','evt_hour', 'evt_location','evt_img'];


    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'etp_id_rol');
    }

}
