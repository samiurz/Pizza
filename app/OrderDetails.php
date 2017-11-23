<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $fillable = ['order_id','description','price'];
}