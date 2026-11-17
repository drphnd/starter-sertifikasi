{{-- Pemakaian: <x-textarea label="Deskripsi" name="description" :value="$item->description ?? ''" /> --}}
@props(['label', 'name', 'value' => null, 'rows' => 3])

<div>
    <label for="{{ $name }}" class="mb-1 block text-sm font-medium">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}"
              {{ $attributes->merge(['class' => 'w-full rounded-lg border px-3 py-2 ' . ($errors->has($name) ? 'border-red-500' : 'border-gray-300')]) }}>{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
