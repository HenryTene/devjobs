<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="#" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                <p class="text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
                <a href="#"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold  uppercase text-center">Candidatos</a>
                <a href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold  uppercase text-center">Editar</a>
                <a href="#"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold  uppercase text-center">Eliminar</a>
            </div>
        </div>

        @empty
        <p class="p-6 text-center text-sm text-gray-600">No hay vacantes</p>
        @endforelse

    </div>

    <div class="flex justify-center mt-5">
        {{ $vacantes->links() }}
    </div>
</div>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "¿Eliminar vacante?",
            text: "Una vez eliminada, no se podrá recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });

    </script>
@endpush
