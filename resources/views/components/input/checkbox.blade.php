@props([
    'name',
    'label',
    'value' => null,
])

<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox"
                       name="{{ $name }}"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                       @if($value) checked @endif>
                <span class="ml-2">{{ $label }}</span>
            </label>
        </div>
    </div>
    
    @error($name)
        <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
