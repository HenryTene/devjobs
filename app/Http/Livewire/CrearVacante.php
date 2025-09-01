<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    public function mount()
    {
        $this->salario = '';
        $this->categoria = '';
    }

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);
        dd($nombre_imagen);

        //Crear la vacante

        // Crear un mensaje

        // Redireccionar al usuario
    }
    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
