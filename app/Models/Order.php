<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = ['customer_id', 'table_id', 'employee_id', 'order_date', 'status', 'total_amount', 'order_type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}

