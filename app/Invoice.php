<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
        'invoice_no'
    ];
    public function InvoiceItems(){
        return $this->hasMany('App\InvoiceItem', 'invoice_id','invoice_no');
    }

    
}
