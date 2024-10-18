<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table='detalle_venta';
    protected $fillable = [
        'product_id',
        'venta_id',
        'cantidad',
        'precio',
    ];

    // Define la relación con el modelo Venta
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    // Relación con Product
    public function producto()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
