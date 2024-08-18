<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'content',
        'title',
        'image',
        'category_id',

    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function client()
    {
        return $this->belongsToMany(Client::class);
    }

}
