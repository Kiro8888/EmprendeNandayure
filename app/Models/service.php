<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class service extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_srv';
    protected $fillable = ['srv_name', 'srv_description','srv_status','srv_img','srv_price', 'srv_id_ctg', 'srv_id_etp'];
    
    public function entrepreneurship(): BelongsTo {
        return $this->belongsTo(Entrepreneurship::class, 'srv_id_etp');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'srv_id_ctg');
    }
}
