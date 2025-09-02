<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @foreach ($vacantes as $vacante)
        <div class="leading-10">
            <a href="#" class="font-bold text-blue-600 hover:underline">
                {{ $vacante->titulo }}
            </a>
        </div>
    @endforeach

</div>
