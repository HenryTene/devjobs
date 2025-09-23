<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostularVacante extends Component
{
    public $cv;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];
    public function postularme()
    {
        $this->validate();
        // Almacenar el cv en el disco duro

        // Crear la vacante

        // Crear la notificacion y enviar el email

        // Mostrar mensaje
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
