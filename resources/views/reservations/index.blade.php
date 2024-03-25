<!-- resources/views/reservations/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('My Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('reservations.create') }}"
                            class="inline-block px-4 py-2 text-white bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 focus:bg-blue-700 dark:focus:bg-blue-900 focus:outline-none">Make
                            a new reservation</a>

                        <table class="w-full mt-4">
                            <thead class="text-black">
                                <tr>
                                    <th class="w-16 p-4 bg-gray-200">ID</th>
                                    <th class="p-4 bg-gray-200">Location</th>
                                    <th class="p-4 bg-gray-200">Person name</th>
                                    <th class="p-4 bg-gray-200">Date</th>
                                    <th class="p-4 bg-gray-200">Time</th>
                                    <th class="p-4 bg-gray-200">Total</th>
                                    <th class="p-4 bg-gray-200">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservations as $reservation)
                                    {{-- @dump($reservation) --}}
                                    <tr>
                                        <td class="w-16 p-4 border">{{ $reservation->id }}</td>
                                        <td class="p-4 border">{{ $reservation->location->name }}</td>
                                        <td class="p-4 border">{{ $reservation->person->name }}</td>
                                        <td class="p-4 border">{{ $reservation->date }}</td>
                                        <td class="p-4 border">{{ $reservation->time }}</td>
                                        <td class="p-4 border">{{ $reservation->total ?? 0 }} DT</td>
                                        <td class="p-4 text-right border">
                                            <div class="flex flex-row items-center justify-center w-full space-x-2">
                                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                                    class="flex items-center justify-center space-x-1 text-base text-white bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 focus:bg-blue-700 dark:focus:bg-blue-900 focus:outline-none">
                                                    <span class="sr-only">Edit</span>
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('reservations.destroy', $reservation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center justify-center space-x-1 text-base text-white bg-red-500 rounded dark:bg-red-700 hover:bg-red-600 dark:hover:bg-red-800 focus:bg-red-700 dark:focus:bg-red-900 focus:outline-none">
                                                        <span class="sr-only">Delete</span>
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="p-4 text-center border min-h-96">No reservations
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
