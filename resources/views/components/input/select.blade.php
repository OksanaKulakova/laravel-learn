@props([
    'name',
    'options',
    'value' => null,
])

<select
    name="{{ $name }}"
    class="@error($name) border-red-600 @enderror block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    @foreach($options as $option)
        <option @if($value) selected @endif>{{ $option }}</option>
    @endforeach
</select>

@error($name)
    <span class="text-xs italic text-red-600">{{ $message }}</span>
@enderror
