{{--
    Pemakaian:
    <x-input label="Nama" name="name" />
    <x-input label="Email" name="email" type="email" :value="$user->email" />
--}}
@props(['label', 'name', 'type' => 'text', 'value' => null])

<div>
    <label for="{{ $name }}" class="mb-1 block text-sm font-medium">{{ $label }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}"
           value="{{ $type === 'password' ? '' : old($name, $value) }}"
           {{ $attributes->merge(['class' => 'w-full rounded-lg border px-3 py-2 ' . ($errors->has($name) ? 'border-red-500' : 'border-gray-300')]) }}>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
