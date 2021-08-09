<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modalAddApoderado">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Añadir Apoderado
            </h3>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-jet-label for="name_apoderado" value="{{ __('Nombre *') }}" />
                    <x-jet-input id="name_apoderado" name="name_apoderado" type="text" class="mt-1 block w-full" />
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-jet-label for="last_name_apoderado" value="{{ __('Apellido *') }}" />
                    <x-jet-input id="last_name_apoderado" name="last_name_apoderado" type="text" class="mt-1 block w-full" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="addressable_apoderado" value="{{ __('Dirección *') }}" />
                    <x-jet-input id="addressable_apoderado" name="addressable_apoderado" type="text" class="mt-1 block w-full"/>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="phoneable_apoderado" value="{{ __('Telefono *') }}" />
                    <x-jet-input id="phoneable_apoderado" name="phoneable_apoderado" type="text" class="mt-1 block w-full" />
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <x-jet-danger-button id="buttonCancelAddApoderado" onclick="closeModal()">
                    {{ __('Cancelar') }}
            </x-jet-danger-button>
            <x-jet-secondary-button id="buttonAddApoderado" onclick="addApoderado()">
                {{ __('Agregar') }}
            </x-jet-secondary-button>
        </div>
    </div>
    </div>
</div>