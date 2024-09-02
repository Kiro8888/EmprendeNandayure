<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_pdt';

    protected $fillable = ['pdt_name', 'pdt_description','pdt_status', 'pdt_img' ,'pdt_price', 'pdt_id_ctg', 'pdt_id_etp', 'etp_email', 'etp_id_rol'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'pdt_id_ctg');
    }

    public function entrepreneurship(): BelongsTo {
        return $this->belongsTo(Entrepreneurships::class, 'pdt_id_etp');
    }
}
