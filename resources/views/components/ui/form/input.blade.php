@props([
    'id' => '',
    'label' => '',
    'type' => 'text',
])
<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        {{ $label }}
    </label>
    <div class="relative">
        <input type="{{ $type }}"
            class="
            {{ $errors->has($id)
                ? 'dark:bg-dark-900 border-error-300 shadow-theme-xs focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800 w-full rounded-lg border bg-transparent px-4 py-2.5 pr-10 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30'
                : 'dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30' }} 
            "
            placeholder="{{ $attributes['placeholder'] }}"
            @if (isset($attributes['is-live'])) wire:model.live="{{ $id }}"
            @else 
                wire:model="{{ $id }}" @endif />
        @if ($errors->has($id))
            <span class="absolute top-1/2 right-3.5 -translate-y-1/2">
                <x-ui.icon.information />
            </span>
        @endif
    </div>

    @error($id)
        <p class="text-theme-xs text-error-500 mt-1.5">
            {{ $message }}
        </p>
    @enderror
</div>
