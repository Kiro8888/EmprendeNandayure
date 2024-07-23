<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'pdt_id_ctg');
    }

    public function entrepreneur(): BelongsTo {
        return $this->belongsTo(Entrepreneur::class, 'pdt_id_etp');
    }
}
