{{-- Form bersama untuk create & edit. Variabel $item hanya ada saat edit. --}}
<div class="space-y-4">
    <x-input label="Nama" name="name" :value="$item->name ?? ''" required />
    <x-textarea label="Deskripsi" name="description" :value="$item->description ?? ''" />
    <x-input label="Stok" name="stock" type="number" min="0" :value="$item->stock ?? 0" required />
</div>
