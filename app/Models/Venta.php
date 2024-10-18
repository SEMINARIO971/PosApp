<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table='ventas';
    protected $fillable = [
        'NombreCliente',
        'Nit',
        'Telefono',
        'Direccion',
        'Factura',
        'Total',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}