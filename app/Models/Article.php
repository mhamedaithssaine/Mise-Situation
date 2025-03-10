<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ="articles";

    use HasFactory;
    protected $fillable=[
        'titre',
        'description',
        'category_id',
    ];


    public function categories(){
        return $this->belongsTo(Category::class);
    }



}
