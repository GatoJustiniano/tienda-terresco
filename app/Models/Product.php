<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 
        'name', 
        'description', 
        'price', 
        'stock_quantity',
        'category_id',
        'brand_id'
    ];

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function scopeWithActivePromotions($query)
    {
        $today = Carbon::today();

        return $query->whereHas('promotions', function ($query) use ($today) {
            $query->where('start_date', '<=', $today)
                ->where('end_date', '>=', $today);
        });
    }

    // obtener los productos sin promociones activas
    public function scopeWithInactivePromotions($query)
    {
        $today = Carbon::today(); 

        return $query->whereDoesntHave('promotions', function ($query) use ($today) {
            $query->where('start_date', '<=', $today)
                ->where('end_date', '>=', $today);
        });
    }

    // Método para calcular el precio con descuento
    public function priceWithDiscount(Promotion $promotion)
    {
        $discount = $promotion->discountAmount($this);
        return $this->price - $discount;
    }

    public function inventoryDetails()
    {
        return $this->hasMany(InventoryDetail::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
