@props([
    'items' => ['View More', 'Delete'],
    'title' => null,
])

@php
    $hasAnyIcon = collect($items)->contains(function ($item) {
        return is_array($item) && isset($item['icon']);
    });
@endphp

<div x-data="{ openDropDown: false }" class="relative h-fit" :class="openDropDown ? 'z-50' : 'z-auto'">
    <button @click="openDropDown = !openDropDown"
        @if ($title)
            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03] dark:hover:text-gray-300"
        @else
            :class="openDropDown ? 'text-gray-700 dark:text-white' : 'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
        @endif
    >
        @if ($title)
            <span>{{ $title }}</span>
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 transition-transform duration-200" 
                :class="openDropDown ? 'rotate-180' : ''" 
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        @else
            <x-ui.icon.three-dot />
        @endif
    </button>

    <div x-show="openDropDown" @click.outside="openDropDown = false" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 z-[9999] w-48 p-2 mt-1 space-y-1 bg-white border border-gray-200 shadow-theme-lg dark:bg-gray-dark top-full rounded-xl dark:border-gray-800 origin-top-right">
        @forelse($items as $item)
            @php
                $isString = is_string($item);
                $label = $isString ? $item : $item['label'] ?? '';
                $action = $isString ? null : $item['action'] ?? null;
                $icon = $isString ? null : $item['icon'] ?? null;
            @endphp
            <button @if ($action) wire:click="{{ $action }}" @endif
                @click="openDropDown = false"
                class="group flex w-full items-center gap-3 px-3 py-2 font-medium text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300 transition-colors text-left">

                @if ($icon)
                    <span
                        class="flex items-center justify-center w-5 h-5 flex-shrink-0 text-gray-500 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors">
                        <x-dynamic-component :component="'ui.icon.' . $icon" class="w-full h-full" />
                    </span>
                @elseif($hasAnyIcon)
                    <!-- Placeholder so text aligns perfectly even if this item has no icon -->
                    <span class="w-5 h-5 flex-shrink-0"></span>
                @endif

                <span class="truncate">{{ $label }}</span>
            </button>
        @empty
            {{ $slot }}
        @endforelse
    </div>
</div>
