<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
	/**
	 * for booking table 's column_name
	 * @var [protected]
	 */
    protected $fillable=[
    	'name','guest_no','booking_date','booking_remark','totalprice','status',
    ];

}
