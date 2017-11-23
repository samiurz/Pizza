<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['name','email','phone','street_address','suburb','state',
        'postcode','product_name', 'price', 'quantity','total_amount'];
}