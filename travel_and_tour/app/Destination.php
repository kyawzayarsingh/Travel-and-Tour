<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model {
	/**
	 * for destination table 's column_name
	 * @var [protected]
	 */
    protected $fillable = [
        'name','city','division','description'
    ];
}
