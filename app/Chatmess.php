<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmess extends Model
{
	protected $table = 'chatmess';
  
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	

}