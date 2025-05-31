<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'image', 'description',
    ];

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class);
    }

    public function order($select)
    {
        if($select == 'asc'){
            return $this->orderBy('price', 'asc')->get();
        } elseif($select == 'desc') {
            return $this->orderBy('price', 'desc')->get();
        } else {
            return self::all();
        }
    }
}
