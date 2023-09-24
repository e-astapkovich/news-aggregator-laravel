<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $fillable = [
        'name',
        'description'
    ];

    public function news(): HasMany {
        return $this->hasMany(News::class, 'category_id');
    }
}
