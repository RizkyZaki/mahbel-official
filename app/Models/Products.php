<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = ['id'];
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
