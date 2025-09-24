<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];
    public function postularme()
    {
        $datos = $this->validate();

        // Almacenar el cv en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear la vacante

        // Crear la notificacion y enviar el email

        // Mostrar mensaje
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
