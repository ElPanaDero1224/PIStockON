<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class proveedor extends Component
{
    
    public $nombre;
    public $telefono;
    public $correo;
    public $productos;
    public $condicionesPago;
    public $id;
    public $frecuenciaSuministro;
    public $horarioAtencion;
    public $pais;
    public $ciudad;

     
    public function __construct($nombre, $telefono, $correo, $productos, $condicionesPago, $id, $frecuenciaSuministro, $horarioAtencion, $pais, $ciudad)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->productos = $productos;
        $this->condicionesPago = $condicionesPago;
        $this->id = $id;
        $this->frecuenciaSuministro = $frecuenciaSuministro;
        $this->horarioAtencion = $horarioAtencion;
        $this->pais = $pais;
        $this->ciudad = $ciudad;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.proveedor');
    }
}
