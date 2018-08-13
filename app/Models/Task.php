<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'title', 'is_completed'
    ];

    protected $casts = [ 'is_completed' => 'boolean' ];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
