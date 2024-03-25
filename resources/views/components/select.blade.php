@props(['label', 'name', 'options', 'value' => null])

<div class="relative mt-4">
    <select
        {{ $attributes->merge([
            'class' =>
                'dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:border-indigo-600 dark:focus:ring-offset-gray-800 dark:focus:ring-offset-gray-800 rounded-md shadow-sm',
        ]) }}
        name="{{ $name }}" id="{{ $name }}">
        <option value="" disabled selected>{{ $label }}</option>
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ $value !== null && $value == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}</option>
        @endforeach
    </select>
    {{-- <div class="absolute inset-y-0 right-0 z-10 flex items-center px-2 pointer-events-none">
        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
        </svg>
    </div> --}}
</div>
