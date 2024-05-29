<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bb extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'title', 'price', 'cat_id', 'text', 'image'];
    
    protected $table = 'bbs';
   
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }
}
