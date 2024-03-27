<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Services') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('admin.services.create') }}"
                            class="inline-block px-4 py-2 text-white bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 focus:bg-blue-700 dark:focus:bg-blue-900 focus:outline-none">
                            Add Service
                        </a>

                        <table class="w-full mt-4">
                            <thead class="text-black">
                                <tr>
                                    <th class="w-16 p-4 bg-gray-200">ID</th>
                                    <th class="p-4 bg-gray-200">Name</th>
                                    <th class="p-4 bg-gray-200">Description</th>
                                    <th class="p-4 bg-gray-200">Location</th>
                                    <th class="p-4 bg-gray-200">Duration</th>
                                    <th class="p-4 bg-gray-200">Price</th>
                                    <th class="p-4 bg-gray-200">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td class="w-16 p-4 border">{{ $service->id }}</td>
                                        <td class="p-4 border">{{ $service->name }}</td>
                                        <td class="p-4 border">{{ $service->description }}</td>
                                        <td class="p-4 border"></td>
                                        {{-- <td class="p-4 border">{{ $service->location->name }}</td> --}}
                                        <td class="p-4 border">{{ $service->duration }}</td>
                                        <td class="p-4 border">{{ $service->price }}</td>
                                        <td class="p-4 text-right border">
                                            <div class="flex flex-row items-center justify-center w-full space-x-2">
                                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                                    class="flex items-center justify-center space-x-1 text-base text-white bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-600 dark:hover:bg-blue-800 focus:bg-blue-700 dark:focus:bg-blue-900 focus:outline-none">
                                                    <span class="sr-only">Edit</span>
                                                    <x-edit-icon />
                                                </a>

                                                <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center justify-center space-x-1 text-base text-white bg-red-500 rounded dark:bg-red-700 hover:bg-red-600 dark:hover:bg-red-800 focus:bg-red-700 dark:focus:bg-red-900 focus:outline-none">
                                                        <span class="sr-only">Delete</span>
                                                        <x-delete-icon />
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="p-4 text-center border min-h-96">No reservations
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
