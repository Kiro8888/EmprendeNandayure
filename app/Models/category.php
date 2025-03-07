<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ctg';

    protected $fillable = ['ctg_name', 'ctg_description'];




    public function products(): HasMany {
        return $this->hasMany(Product::class, 'pdt_id_ctg');
    }
}
