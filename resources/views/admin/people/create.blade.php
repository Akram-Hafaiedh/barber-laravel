<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add People') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto md:max-w-5xl lg:max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">Person Information</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Please fill in the details below.</p>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('admin.people.store') }}">
                        @csrf
                        <div class="py-5 divide-y devide-gray-200 dark:divide-gray-700 sm:p-6">
                            <!-- Person Details -->
                            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6">
                                <!-- First Name -->
                                <div>
                                    <x-input-label for="first_name" :value="__('First Name')" />
                                    <x-text-input id="first_name" class="block w-full mt-1" type="text"
                                        name="first_name" required autofocus />
                                    <x-input-error :messages="$errors->get('first_name')" />
                                </div>
                                <!-- Last Name -->
                                <div>
                                    <x-input-label for="last_name" :value="__('Last Name')" />
                                    <x-text-input id="last_name" class="block w-full mt-1" type="text"
                                        name="last_name" required autofocus />
                                    <x-input-error :messages="$errors->get('last_name')" />
                                </div>
                                <!-- Birthdate -->
                                <div>
                                    <x-input-label for="birthdate" :value="__('Birthdate')" />
                                    <x-type-input id="birthdate" :type="date" class="block w-full mt-1"
                                        type="text" name="birthdate" required autofocus />
                                    <x-input-error :messages="$errors->get('birthdate')" />
                                </div>
                                <!-- ID Number -->
                                <div>
                                    <x-input-label for="id_number" :value="__('ID Number')" />
                                    <x-text-input id="id_number" class="block w-full mt-1" type="text"
                                        name="id_number" required autofocus />
                                    <x-input-error :messages="$errors->get('id_number')" />
                                </div>
                                <!-- Email -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-type-input id="email" :type="email" class="block w-full mt-1"
                                        type="text" name="email" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>
                                <!-- Role -->
                                <div>
                                    <x-input-label for="role" :value="__('Role')" />
                                    <x-select id="role" class="block w-full mt-1" :options="$roles"
                                        :label="__('Role')" name="role" required autofocus></x-select>
                                    <x-input-error :messages="$errors->get('role')" />
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="grid grid-cols-1 mt-6 gap-y-4 sm:grid-cols-2 sm:gap-x-6">
                                <!-- Address Line 1 -->
                                <div>
                                    <x-input-label for="address_line_1" :value="__('Address Line 1')" />
                                    <x-text-input id="address_line_1" class="block w-full mt-1" type="text"
                                        name="address_line_1" required autofocus />
                                    <x-input-error :messages="$errors->get('address_line_1')" />
                                </div>
                                <!-- Address Line 2 -->
                                <div>
                                    <x-input-label for="address_line_2" :value="__('Address Line 2')" />
                                    <x-text-input id="address_line_2" class="block w-full mt-1" type="text"
                                        name="address_line_2" autofocus />
                                    <x-input-error :messages="$errors->get('address_line_2')" />
                                </div>
                                <!-- City -->
                                <div>
                                    <x-input-label for="city" :value="__('City')" />
                                    <x-text-input id="city" class="block w-full mt-1" type="text" name="city"
                                        required autofocus />
                                    <x-input-error :messages="$errors->get('city')" />
                                </div>
                                <!-- State -->
                                <div>
                                    <x-input-label for="state" :value="__('State')" />
                                    <x-text-input id="state" class="block w-full mt-1" type="text" name="state"
                                        required autofocus />
                                    <x-input-error :messages="$errors->get('state')" />
                                </div>
                                <!-- Postal Code -->
                                <div>
                                    <x-input-label for="postal_code" :value="__('Postal Code')" />
                                    <x-text-input id="postal_code" class="block w-full mt-1" type="number"
                                        name="postal_code" required autofocus />
                                    <x-input-error :messages="$errors->get('postal_code')" />
                                </div>
                                <!-- Country -->
                                <div>
                                    <x-input-label for="country" :value="__('Country')" />
                                    <x-text-input id="country" class="block w-full mt-1" type="text" name="country"
                                        required autofocus />
                                    <x-input-error :messages="$errors->get('country')" />
                                </div>
                                <!-- Location -->
                                <div>
                                    <x-input-label for="location" :value="__('Location')" />
                                    <x-select id="role" class="block w-full mt-1" :options="$locations->pluck('name', 'id')"
                                        :label="__('Locations')" name="location" required autofocus></x-select>
                                    <x-input-error :messages="$errors->get('country')" />
                                </div>
                            </div>

                            <!-- Shifts -->
                            <div class="mt-6">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Shifts</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Add shifts for the person.</p>
                                <div x-data="{ days: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], shifts: Array(7).fill().map(() => [{ start_time: '', end_time: '' }]) }">
                                    <template x-for="(shiftsForDay, index) in shifts" :key="index">
                                        <div class="mt-4">
                                            <!-- Shifts for Each Day -->
                                            <div>
                                                <div class="flex items-center justify-between mb-2 dark:text-gray-200">
                                                    <label :for="days[index]" class="text-sm"
                                                        x-text="days[index]"></label>
                                                    <button type="button"
                                                        @click="shiftsForDay.push({start_time: '', end_time: ''})"
                                                        class="p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                                                        <x-plus-icon class="w-5 h-5 text-gray-500 dark:text-gray-300" />
                                                    </button>
                                                </div>
                                                <!-- Shift Timings -->
                                                <template x-for="(shift, shiftIndex) in shiftsForDay"
                                                    :key="shiftIndex">
                                                    <div class="flex items-center space-x-4">
                                                        <!-- Start Time -->
                                                        <div class="flex-1">
                                                            <label for="start_time"
                                                                class="block text-sm text-gray-600 dark:text-gray-300">Start</label>
                                                            <input type="time" name="start_time"
                                                                x-model="shift.start_time"
                                                                class="block w-full mt-1 text-sm bg-white border-gray-300 rounded-md dark:bg-gray-900 dark:border-gray-600">
                                                        </div>
                                                        <!-- End Time -->
                                                        <div class="flex-1">
                                                            <label for="end_time"
                                                                class="block text-sm text-gray-600 dark:text-gray-300">End</label>
                                                            <input type="time" name="end_time"
                                                                x-model="shift.end_time"
                                                                class="block w-full mt-1 text-sm bg-white border-gray-300 rounded-md dark:bg-gray-900 dark:border-gray-600">
                                                        </div>
                                                        <!-- Remove Shift Button -->
                                                        <button type="button"
                                                            @click="shiftsForDay.splice(shiftIndex, 1)"
                                                            class="p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                                                            <x-minus-icon
                                                                class="w-5 h-5 text-gray-600 dark:text-gray-400" />
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <x-primary-button type="submit">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
