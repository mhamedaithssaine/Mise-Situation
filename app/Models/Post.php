<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $table ='posts';

    protected $fillable=[
     'user_id',
     'titre',
     'content',
    ];

    public function users(){
          return $this->belongsTo(User::class);
    }
}
