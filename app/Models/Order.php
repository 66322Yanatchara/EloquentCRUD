<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderDetail;

class Order extends Model
{
    //
    use HasFactory;
    protected $primaryKey = 'OrderID';
    protected $fillable = [
        'OrderDate',
        'CustomerID',
        'TotalAmount',
    ];

    /**
     * Get the customer that owns the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'CustomerID');  // ใช้ CustomerID แทน id
    }

    /**
     * Get the order details for the order.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'OrderID', 'OrderID');  // ใช้ OrderID แทน id
    }
}