<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkouts extends Model
{
    //
    public function book_item()
    {
      return $this->belongsTo('App\book_item','book_id');
    }
    public function User()
    {
      return $this->belongsTo('App\user','User_id');
    }
}
