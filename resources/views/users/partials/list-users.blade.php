<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Lista de usuarios') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('En esta sección se pueden administrar los accesos a los usuarios del sistema.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <div class="container">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                                <thead class="border-b font-medium dark:border-neutral-500 dark:text-gray-300">
                                    <tr>
                                        {{-- <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            N°
                                        </th> --}}
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Nombre
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Correo Electr&oacute;nico
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Rol
                                        </th>
                                        <th scope="col" class="px-6 py-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="dark:text-gray-400">
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr class="border-b dark:border-neutral-500">
                                                {{-- <td
                                                    class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                    {{ $loop->index + 1 }}
                                                </td> --}}
                                                <td
                                                    class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    {{ $user->name }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    {{ $user->email }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    <span
                                                        class="bg-indigo-700 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-700 dark:text-indigo-100">
                                                        {{ $user->getRoleNames()[0] }}
                                                    </span>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <x-primary-icon-button onclick="fillUserData({{ $user }})" class="mr-2">
                                                        <i class="lni lni-pencil"></i>
                                                    </x-primary-icon-button>
                                                    <x-danger-icon-button onclick="deleteUser({{ $user->id }})">
                                                        <i class="lni lni-trash-can"></i>
                                                    </x-danger-icon-button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="border-b dark:border-neutral-500">
                                            <td colspan="4"
                                                class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                No hay informaci&oacute;n
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-5">
                                {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
