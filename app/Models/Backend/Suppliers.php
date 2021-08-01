<?php

namespace App\Models\Backend;
use App\user;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    public function user()
    {
      return $this->hasOne(User::class);
    }
}
