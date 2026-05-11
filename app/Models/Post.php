<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  use HasUuids;
  protected $table = 'post';
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;
  
  protected $fillable = ['title', 'body','author', 'published']; //fields that can be updeted

  protected $guarded  =['id'];//cannot be updeted /assigned (readonly)

  public function comments(){
    return $this->hasmany(Comment::class);
  }

  public function tags(){
    return $this->belongsToMany(Tag::class);
  }
}
