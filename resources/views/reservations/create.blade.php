<!-- resources/views/reservations/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('New Reservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800" x-data="{
                    selectedLocation: null,
                    selectedPerson: null,
                    people: [],
                    services: [],
                    selectedServices: [],
                    subtotal: 0,
                
                    fetchPeople() {
                        console.log('Fetching People');
                        if (!this.selectedLocation) {
                            this.people = [];
                            return;
                        }
                        console.log('Selected Location', this.selectedLocation);
                
                        axios.get(`/api/locations/${this.selectedLocation}/people`)
                            .then(response => {
                                this.people = response.data.people;
                                console.log('People Data', this.people);
                            })
                            .catch(error => {
                                console.error('Error fetching people:', error);
                            });
                    },
                    fetchServices() {
                        console.log('Fetching Services')
                        if (!this.selectedPerson) {
                            this.services = [];
                            return;
                        }
                        axios.get(`/api/people/${this.selectedPerson}/services`)
                            .then(response => {
                                this.services = response.data.services;
                                console.log('Services Data', this.services);
                            })
                            .catch(error => {
                                console.error('Error fetching services:', error);
                            })
                    },
                }">

                    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-4">
                        @csrf

                        @if ($errors->any())
                            <div class="p-2 text-white bg-red-500 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="flex items-center space-x-2">
                            <div class="flex-grow">
                                <label for="date"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Date</label>
                                <input type="date" id="date" name="date" value="{{ old('date') }}"
                                    class="text-sm block w-full px-3 py-2 placeholder-gray-400 border  rounded-md text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 h-8 @error('date') border-red-500 @enderror">

                                @error('date')
                                    <p class="mt-1 text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="time"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Time</label>
                                <input type="time" id="time" name="time" value="{{ old('time') }}"
                                    class="text-sm block w-full py-2 text-gray-700  border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400 h-8 @error('time') border-red-500 @enderror">
                                @error('time')
                                    <p class="mt-1 text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="mb-4">
                            <label for="location_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Select a Location
                            </label>
                            <select id="location_id" name="location_id"
                                class="block appearance-none w-full py-2 px-3 rounded-md leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400 h-8 text-sm @error('location_id') border-red-500 @enderror"
                                x-model="selectedLocation" @change="fetchPeople">
                                <option value="">Select Location</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}"
                                        {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('location_id')
                                <p class="mt-1 text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Person -->
                        <div class="mb-4" x-show="people.length">
                            <label for="person_id"
                                class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Person:</label>
                            <select name="person_id" id="person"
                                class="block appearance-none w-full py-2 px-3 rounded-md leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400 h-8 text-sm @error('person_id') border-red-500 @enderror"
                                x-model="selectedPerson" @change="fetchServices">
                                <option value="">Select Person</option>
                                <template x-for="person in people" :key="person.id">
                                    <option :value="person.id" x-text="person.name"></option>
                                </template>
                            </select>
                            @error('person_id')
                                <p class="mt-1 text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Services -->
                        <div x-show="services.length">
                            <label for="services"
                                class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Services:</label>
                            <div
                                class="grid items-center grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                                <template x-for="service in services" :key="service.id">
                                    <div class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-300">
                                        <label>
                                            <input type="checkbox" :value="service.id" name="services[]"
                                                class="form-checkbox"
                                                @change="subtotal = $event.target.checked ? subtotal + Number(service.price): subtotal - Number(service.price)">
                                            <span x-text="service.name"></span>
                                        </label>
                                        <span x-text="'- Price: (' + service.price+' DT)'">-</span>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <!-- Subtotal -->
                        <div>
                            <template x-if="subtotal > 0">
                                <p
                                    class="px-2 py-1 mt-2 text-sm font-bold bg-gray-200 rounded dark:text-white dark:bg-gray-700">
                                    Subtotal: <span x-text="subtotal"></span> DT
                                </p>
                            </template>
                            <input type="hidden" name="total" x-model="subtotal">
                        </div>

                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Make
                            Reservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
