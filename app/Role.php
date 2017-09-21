<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	const canEditOwn = 1;
	const canEditAll = 2;
	const canDeleteOwn = 4;
	const canDeleteAll = 8;
	const canAdd = 16;  
  
}