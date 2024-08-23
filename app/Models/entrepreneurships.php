<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use spatie
use Spatie\Permission\Traits\HasRoles;

class entrepreneurships extends Model
{
    //use spatie
    use HasRoles;
    use HasFactory;

    protected $fillable = ['etp_name', 'etp_latitude','etp_longitude', 'etp_status', 'etp_num', 'etp_email','etp_img', 'etp_id_user'];


    
    public function user(): BelongsTo {
        return $this->belongsTo(Rol::class, 'etp_id_user');
    }
}
