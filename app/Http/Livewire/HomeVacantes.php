<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        // Validar y sanitizar entradas
        $this->termino = is_string($termino) ? trim($termino) : null;
        $this->categoria = is_numeric($categoria) ? (int) $categoria : null;
        $this->salario = is_numeric($salario) ? (int) $salario : null;

        // Emitir a componente hijo para sincronización
        $this->emit('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {
        $vacantes = $this->buildVacantesQuery()->paginate(10);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }

    /**
     * Construye la consulta de vacantes con filtros aplicados.
     * Recomendación: Añadir índices en titulo, empresa, categoria_id, salario_id.
     */
    private function buildVacantesQuery()
    {
        return Vacante::when($this->termino, function ($query) {
            // Buscar en título o empresa (case-insensitive si la BD lo soporta)
            $query->where(function ($q) {
                $q->where('titulo', 'LIKE', "%{$this->termino}%")
                  ->orWhere('empresa', 'LIKE', "%{$this->termino}%");
            });
        })
        ->when($this->categoria, function ($query) {
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function ($query) {
            $query->where('salario_id', $this->salario);
        });
        // Opcional: Añadir eager loading si se necesitan relaciones
        // ->with(['categoria', 'salario']);
    }
}
