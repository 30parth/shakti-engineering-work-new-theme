@props([
    'id' => '',
])

<div class="flex gap-2">
    <x-ui.button.edit-button id="{{ $id }}" />
    <x-ui.button.delete-button id="{{ $id }}" />
</div>
