@props([
    'navigateBackRoute' => null,
    'formId' => null,
])

<div class="mt-8 flex justify-between gap-3">
    @if ($navigateBackRoute)
        <x-ui.button wire:click="back" variant="outline" type="button">Back</x-ui.button>
    @endif
    <x-ui.button type="submit" form="{{ $formId }}">Save</x-ui.button>
</div>
