<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    use HasFactory;
    protected $primaryKey = 'OrderDetailID';

    // กำหนดคอลัมน์ที่สามารถกรอกข้อมูลได้
    protected $fillable = [
        'OrderID',
        'ProductID',
        'Quantity',
        'UnitPrice',
    ];

    /**
     * Get the order that owns the order detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID', 'OrderID');  // ใช้ OrderID แทน id
    }


    /**
     * Get the product associated with the order detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');  // ใช้ ProductID แทน id
    }
}