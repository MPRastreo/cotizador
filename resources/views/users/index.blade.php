<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-8 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="max-w-7xl mx-auto py-2 pt-0 mt-0">
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-user-modal')">
                    Añadir Usuario
                </x-primary-button>
                <x-primary-button class="hidden" id="edit_button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-user-modal')">
                    Añadir Usuario
                </x-primary-button>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('users.partials.list-users')
                </div>
            </div>
        </div>
    </div>

    <x-modal name="add-user-modal" focusable>
        <div class="container p-8">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Añadir nuevo usuario') }}
            </h2>

            <p class="mt-1 mb-3 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Llena la siguiente información para añadir un nuevo usuario') }}
            </p>

            <form action="javascript:dispatchEventSubmit('form-add-user');" class="form-add-user">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                </div>

                <div class="mt-4">
                    <x-input-label for="roles" :value="__('Rol')"  />

                    <x-select :options="$options" id="roles" :required="true"></x-select>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3">
                        {{ __('Añadir') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

    <x-modal name="edit-user-modal" focusable>
        <div class="container p-8">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Editar usuario') }}
            </h2>

            <p class="mt-1 mb-3 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Llena la siguiente información para actualizar la información del usuario') }}
            </p>

            <form action="javascript:dispatchEventSubmit('form-add-user');" class="form-edit-user">
                <!-- Id (Hidden) -->
                <x-text-input id="edit_id" class="block mt-1 w-full" type="hidden" name="edit_id"
                        :value="old('edit_id')" required autofocus autocomplete="edit_id" />

                <!-- Name -->
                <div>
                    <x-input-label for="edit_name" :value="__('Nombre')" />
                    <x-text-input id="edit_name" class="block mt-1 w-full" type="text" name="edit_name"
                        :value="old('edit_name')" required autofocus autocomplete="edit_name" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="edit_email" :value="__('Correo Electrónico')" />
                    <x-text-input id="edit_email" class="block mt-1 w-full" type="email" name="edit_email"
                        :value="old('edit_email')" required autocomplete="edit_email" />
                </div>

                <div class="mt-4">
                    <x-input-label for="edit_roles" :value="__('Rol')"  />

                    <x-select :options="$options" id="edit_roles" :required="true"></x-select>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3">
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

    @section('scripts')
        <script src="{{ asset('js/users/utils/util.js') }}"></script>
        <script src="{{ asset('js/users/user.js') }}"></script>
    @endsection
</x-app-layout>
