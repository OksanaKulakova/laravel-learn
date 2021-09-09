@props([
    'name',
    'placeholder',
    'value' => null,
])

<input 
    name="{{ $name }}" 
    type="text" 
    class="@error($name) border-red-600 @enderror mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
    placeholder="{{ $placeholder }}"
    value="{{ $value }}">

@error($name)
    <span class="text-xs italic text-red-600">{{ $message }}</span>
@enderror
