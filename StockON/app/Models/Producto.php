<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'precioUnitario',
        'dimensiones',
        'precauciones',
        'cantidad',
        'caracteristicas',
        'codigoLote',
        'material',
        'id_inventario',
    ];

    /**
     * Relación de un producto con el inventario.
     * Un producto pertenece a un inventario.
     */
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }

    /**
     * Relación de un producto con muchas ventas.
     * Un producto puede tener muchas ventas.
     */
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    } 

}
