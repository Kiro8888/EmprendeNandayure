<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class service extends Model
{
    use HasFactory;
    public function entrepreneur(): BelongsTo {
        return $this->belongsTo(Entrepreneur::class, 'srv_id_etp');
    }
}
