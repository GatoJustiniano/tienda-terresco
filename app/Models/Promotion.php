<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 
        'discount_percentage', 
        'start_date', 
        'end_date'
    ];

    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function isActive()
    {
        $now = Carbon::now();
        $startDate = Carbon::parse($this->start_date)->startOfDay(); // Fecha de inicio
        $endDate = Carbon::parse($this->end_date)->endOfDay(); // Fecha de fin 

        return $now->between($startDate, $endDate);
    }

    // Descuento calculado
    public function discountAmount(Product $product)
    {
        return $product->price * ($this->discount_percentage / 100);
    }
}
