<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salario;

class CrearVacante extends Component
{
    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();
        return view('livewire.crear-vacante',[
            'salarios' => $salarios
        ]);
    }
}
