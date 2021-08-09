<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matrícula de Estudiantes') }}
        </h2>
        <p class="font-light text-sm text-gray-800 leading-tight">Registro de Nuevos Estudiantes</p>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-6">
                <form action="{{route('matricula.store')}}" method="POST">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="dni" value="{{ __('DNI *') }}" />
                                <x-jet-input required id="dni" name="dni" type="text" class="mt-1 block w-full" :value="old('dni')" placeholder="Dni"/>
                                <x-jet-input-error for="dni" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="name" value="{{ __('Nombre *') }}" />
                                <x-jet-input required id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" placeholder="Nombre" />
                                <x-jet-input-error for="name" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <x-jet-label for="last_name" value="{{ __('Apellido *') }}" />
                                <x-jet-input required id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name')" placeholder="Apellido" />
                                <x-jet-input-error for="last_name" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="addressable" value="{{ __('Dirección *') }}" />
                                <x-jet-input required id="addressable" name="addressable" type="text" class="mt-1 block w-full" :value="old('addressable')" placeholder="Dirección"/>
                                <x-jet-input-error for="addressable" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="phoneable" value="{{ __('Telefono *') }}" />
                                <x-jet-input required id="phoneable" name="phoneable" type="text" class="mt-1 block w-full" :value="old('phoneable')" placeholder="Teléfono"/>
                                <x-jet-input-error for="phoneable" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="date_birth" value="{{ __('Fecha de Nacimiento *') }}" />
                                <x-jet-input required id="date_birth" name="date_birth" type="date" class="mt-1 block w-full" :value="old('date_birth')"/>
                                <x-jet-input-error for="date_birth" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="payment" value="{{ __('Mensualidad *') }}" />
                                <x-jet-input required id="payment" name="payment" type="text" class="mt-1 block w-full" :value="old('payment')" placeholder="Mensualidad" />
                                <x-jet-input-error for="payment" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="enrollment" value="{{ __('Matrícula *') }}" />
                                <x-jet-input required id="enrollment" name="enrollment" type="text" class="mt-1 block w-full" :value="old('enrollment')" placeholder="Matrícula" />
                                <x-jet-input-error for="enrollment" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="date_start" value="{{ __('Fecha de Inicio *') }}" />
                                <x-jet-input required id="date_start" name="date_start" type="date" class="mt-1 block w-full" :value="old('date_start')" placeholder="Dirección" />
                                <x-jet-input-error for="date_start" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="academic_degree_id" value="{{ __('Grado *') }}" />
                                <select required name="academic_degree_id" id="academic_degree_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline border-gray-300">
                                    <option value="0" selected>Selecciona Grado</option>
                                    @foreach ($academic_degree as $item)
                                    <option value="{{$item->id}}">{{$item->academic_degree}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="academic_degree_id" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="blood_type_id" value="{{ __('Tipo de Sangre *') }}" />
                                <select required name="blood_type_id" id="blood_type_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline border-gray-300">
                                    <option value="0" selected>Selecciona Tipo de Sangre</option>
                                    @foreach ($blood_type as $item)
                                    <option value="{{$item->id}}" ¿>{{$item->blood_type}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="blood_type_id" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-secondary-button id="buttonModalApoderado" onclick="openModal()">
                                    {{ __('Añadir Padre y/o Apoderado') }}
                                </x-jet-secondary-button>
                            </div>
                        </div>
                        <br>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <table id="tableApoderado" class="table-auto border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="border border-green-600">Nombres y Apellidos</th>
                                            <th class="border border-green-600">Dirección</th>
                                            <th class="border border-green-600">Telefono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <x-jet-button>
                            {{ __('Guardar') }}
                        </x-jet-button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    @include('matricula.add-apoderado')
    <script>
    let apoderado = document.getElementById('modalAddApoderado');
    apoderado.style.display = "none";
    let tablaApoderado = document.getElementById('tableApoderado');
    tablaApoderado.style.display = "none";
    let datosApoderado = [];
    const cuerpoApoderados = document.querySelector('#tableApoderado tbody');

    const openModal = () => {
        apoderado.style.display = "block";
    }
    
    const closeModal = () => {
        apoderado.style.display = "none";
    }
    
    const addApoderado = () => {
        const datosApoderadoIndividual = {
            nombre: document.getElementById("name_apoderado").value,
            apellido: document.getElementById("last_name_apoderado").value,
            direccion: document.getElementById("addressable_apoderado").value,
            telefono: document.getElementById("phoneable_apoderado").value,
        }
        datosApoderado = [...datosApoderado, datosApoderadoIndividual];
        document.getElementById("name_apoderado").value = "",
        document.getElementById("last_name_apoderado").value = "",
        document.getElementById("addressable_apoderado").value = "",
        document.getElementById("phoneable_apoderado").value = "",
        listarTable();
        apoderado.style.display = "none";
        Swal.fire({
            icon: 'success',
            title: 'Apoderado Agregado Correctamente',
            showConfirmButton: true,
        })
    }

    const listarTable = () => {
        limpiarArregloApoderados();
        datosApoderado.forEach(infoApoderado => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td class="border border-green-600">${infoApoderado.nombre} ${infoApoderado.apellido}<input type="hidden" name="apoderado_name[]" value="${infoApoderado.nombre}"><input type="hidden" name="apoderado_last_name[]" value="${infoApoderado.apellido}"></td>
                <td class="border border-green-600">${infoApoderado.direccion} <input type="hidden" name="direccion_name[]" value="${infoApoderado.direccion}"></td>
                <td class="border border-green-600">${infoApoderado.telefono}<input type="hidden" name="telefono_name[]" value="${infoApoderado.telefono}"></td>
            `;
            cuerpoApoderados.appendChild(fila);
        });
        tablaApoderado.style.display = "block";
    }

    const limpiarArregloApoderados = () => {
        while(cuerpoApoderados.firstChild){
        cuerpoApoderados.removeChild(cuerpoApoderados.firstChild);
        }
    }
    </script>
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Estudiante agregado correctamente!',
                showConfirmButton: true,
            })
        </script>
    @endif
</x-app-layout>

