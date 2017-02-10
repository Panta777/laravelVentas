<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model {

    protected $table = 'venta';
    protected $primaryKey = 'idventa';
    public $timestamps = false;
    protected $fillable = [
        'idcliente',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado'
    ];
    protected $guarded = [
    ];

}
