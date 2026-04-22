@props([
    'id' => '',
])
<div class="cursor-pointer" wire:click="editRecord({{ $id }})">
    <x-ui.icon.pencil />
</div>
