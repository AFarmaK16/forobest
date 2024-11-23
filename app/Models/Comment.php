<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected  
    $fillable = [
           'photo_id',
           'user_name',
           'user_email',
           'comment',
       ];
   
       // Relation
       public function photo()
       {
           return $this->belongsTo(Photo::class);
       }
   
       // Relation avec les réponses (si nécessaire)
       // public function replies()
       // {
       //     return $this->hasMany(Reply::class);
       // }
}
