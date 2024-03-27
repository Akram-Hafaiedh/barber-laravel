<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200 dark:text-gray-100 sm:px-20 dark:border-gray-700">
                    <form method="POST" action="{{ route('admin.people.store') }}">
                        @csrf
                        {{-- Person --}}
                        <div>
                            <h3 class="mt-8 text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">Person</h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Person related fields.</p>
                        </div>

                        <div class="grid mt-8 sm:grid-cols-2 gap-x-4 gap-y-2">
                            <div>
                                <x-input-label for="first_name" :value="__('First Name')" />

                                <x-text-input id="first_name" class="block w-full h-8 mt-2 text-sm" type="text" name="first_name"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="last_name" :value="__('Last Name')" />

                                <x-text-input id="last_name" class="block w-full h-8 mt-2 text-sm" type="text" name="last_name"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="birthdate" :value="__('Birthdate')" />

                                <x-type-input id="birthdate" :type="date" class="block w-full h-8 mt-2 text-sm" type="text" name="birthdate"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="id_number" :value="__('ID Number')" />

                                <x-text-input id="id_number" class="block w-full h-8 mt-2 text-sm" type="text" name="id_number"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
                            </div>
                            <div class="">
                                <x-input-label for="email" :value="__('Email')" />

                                <x-type-input id="email" :type="email" class="block w-full h-8 mt-2 text-sm" type="text" name="email"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="">
                                <x-input-label for="role" :value="__('Role')" />

                                <x-select id="role" class="block w-full h-8 mt-2 text-sm leading-tight appearance-none" :options="$roles" :label="__('Role')" name="role" required autofocus></x-select>

                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="my-8">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">Address</h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Address related fields.</p>
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div class="sm:col-span-1">
                                <x-input-label for="address_line_1" :value="__('Address Line 1')" />

                                <x-text-input id="address_line_1" class="block w-full h-8 mt-2 text-sm" type="text"
                                name="address_line_1" required autofocus />
                                <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-label for="address_line_2" :value="__('Address Line 2')" />

                                <x-text-input id="address_line_2" class="block w-full h-8 mt-2 text-sm" type="text"
                                    name="address_line_2" autofocus />
                                <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-label for="city" :value="__('City')" />

                                <x-text-input id="city" class="block w-full h-8 mt-2 text-sm" type="text" name="city" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-label for="state" :value="__('State')" />

                                <x-text-input id="state" class="block w-full h-8 mt-2 text-sm" type="text" name="state" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('state')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-label for="postal_code" :value="__('Postal Code')" />

                                <x-text-input id="postal_code" class="block w-full h-8 mt-2 text-sm" type="number"
                                    name="postal_code" required autofocus />
                                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-label for="country" :value="__('Country')" />

                                <x-text-input id="country" class="block w-full h-8 mt-2 text-sm" type="text" name="country"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-1">
                                <x-input-label for="location" :value="__('Location')" />

                                <x-select id="role" class="block w-full h-8 mt-2 text-sm leading-tight appearance-none" :options="$locations->pluck('name', 'id')" :label="__('Locations')" name="location" required autofocus></x-select>

                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Shifts --}}

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
