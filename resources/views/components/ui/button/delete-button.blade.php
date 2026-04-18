@props([
    'id' => '',
])
<div class="cursor-pointer" wire:click="deleteRecord({{ $id }})" wire:confirm="Are You Sure to Delete This ? ">
    <x-ui.icon.delete />
</div>
