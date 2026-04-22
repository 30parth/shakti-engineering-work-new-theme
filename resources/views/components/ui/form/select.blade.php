@props([
    'id' => '',
    'label' => '',
    'options' => [],
    'isRequired' => false,
    'placeholder' => 'Select...',
])
<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        {{ $label }} {{ $isRequired ? '*' : '' }}
    </label>

    <div x-data="{
        open: false,
        selected: @entangle($id),
        options: {{ json_encode($options) }},
        get selectedOption() {
            return this.options.find(o => o.id == this.selected) || null;
        },
        selectOption(id) {
            this.selected = id;
            this.open = false;
        }
    }" class="relative" @click.away="open = false">

        <!-- Select Input Trigger -->
        <div @click="open = !open"
            class="{{ $errors->has($id)
                ? 'dark:bg-dark-900 border-error-300 shadow-theme-xs focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800 w-full rounded-lg border bg-white px-4 py-2.5 pr-10 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 cursor-pointer flex min-h-11 items-center justify-between gap-2 transition'
                : 'dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 cursor-pointer flex min-h-11 items-center justify-between gap-2 transition' }}">

            <div class="flex-1 truncate">
                <span x-show="selectedOption" x-text="selectedOption ? selectedOption.name : ''"
                    class="text-sm text-gray-800 dark:text-white/90"></span>
                <span x-show="!selectedOption"
                    class="text-sm text-gray-500 dark:text-gray-400">{{ $placeholder }}</span>
            </div>

            <!-- Dropdown Arrow -->
            <div class="flex items-start">
                <svg class="h-5 w-5 shrink-0 text-gray-500 transition-transform dark:text-gray-400"
                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            @if ($errors->has($id))
                <span class="absolute top-1/2 right-10 -translate-y-1/2">
                    <x-ui.icon.information />
                </span>
            @endif
        </div>

        <!-- Dropdown Options List -->
        <div x-show="open" x-transition
            class="absolute z-50 mt-1 w-full overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-900"
            style="max-height: 16rem; display: none;">
            <div class="overflow-y-auto" style="max-height: 16rem">
                <template x-for="option in options" :key="option.id">
                    <div @click="selectOption(option.id)"
                        class="cursor-pointer border-b border-gray-200 px-4 py-3 text-sm transition last:border-b-0 hover:bg-brand-100 dark:border-gray-800 dark:hover:bg-gray-800"
                        :class="selected == option.id ? 'menu-item-active' : ''">
                        <span x-text="option.name"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>

    @error($id)
        <p class="text-theme-xs text-error-500 mt-1.5">
            {{ $message }}
        </p>
    @enderror
</div>
