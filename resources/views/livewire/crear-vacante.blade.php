<form class="md:w-1/2 space-y-5" action="">

       <div>
            <x-label for="titulo" :value="__('Título Vacante ')" />
            <x-text-input
                id="titulo"
                class="block mt-1 w-full"
                type="text"
                name="titulo"
                :value="old('titulo')"
                placeholder="Título Vacante"
            />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

          <div>
            <x-label for="salario" :value="__('Salario Mensual' )" />
            <select
                id="salario"
                name="salario"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"

               <option >-- Selecciona un salario --</option>
               @foreach ($salarios as $salario)
                   <option value="{{ $salario->id }}">
                       {{ $salario->salario }}
                   </option>
               @endforeach



            </select>
            <x-input-error :messages="$errors->get('salario')" class="mt-2" />

        </div>

         <div>
            <x-label for="categoria" :value="__('Categoría')" />
            <select
                id="categoria"
                name="categoria"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"

                <option value="">-- Selecciona una categoría --</option>
                <option value="tecnologia" {{ old('categoria') == 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
                <option value="marketing" {{ old('categoria') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="finanzas" {{ old('categoria') == 'finanzas' ? 'selected' : '' }}>Finanzas</option>

            </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div>
            <x-label for="empresa" :value="__('Empresa')" />
            <x-text-input
                id="empresa"
                class="block mt-1 w-full"
                type="text"
                name="empresa"
                :value="old('empresa')"
                placeholder="Nombre de la Empresa"
            />
            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>

        <div>
            <x-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-text-input
                id="ultimo_dia"
                class="block mt-1 w-full"
                type="date"
                name="ultimo_dia"
                :value="old('ultimo_dia')"
            />
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <div>
            <x-label for="descripcion" :value="__('Descripción')" />
            <textarea
                id="descripcion"
                name="descripcion"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                rows="5"
                placeholder="Descripción del trabajo"
            >{{ old('descripcion') }}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

           <div>
            <x-label for="imagen" :value="__('Imagen')" />
            <x-text-input
                id="imagen"
                class="block mt-1 w-full"
                type="file"
                name="imagen"
            />
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>

        <x-button>
            {{ __('Crear Vacante') }}
        </x-button>


    </form>
