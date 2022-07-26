<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {
	/**
	 * for Package table's column_name
	 * @var [protected]
	 */
	protected $fillable=[
    	'name','descripton','price',
    ];
}
