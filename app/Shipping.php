<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function vendor()
    {
        return $this->belongsTo('App\Vendor','vendor_code','vendor_code');
    }
}
