<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'user_id', 'category_id'];

    public function users(): BelongsTo  {
        return $this->belongsTo(User::class);
    }
    
    public function category(): BelongsTo  {
        return $this->belongsTo(Category::class);
    }
    
}