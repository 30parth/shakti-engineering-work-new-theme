<div class="flex flex-col gap-4 mb-4 sm:flex-row sm:items-center sm:justify-between">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
        <div class="relative">
            <button type="button" class="absolute -translate-y-1/2 left-4 top-1/2">
                <x-ui.icon.search />
            </button>
            <input wire:model.live="search" type="text" placeholder="Search..."
                class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-[42px] pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800 xl:w-[300px]" />
        </div>
    </div>
    <div class="flex items-center gap-3">
        <x-ui.dropdowm title="Manage Record" :items="[
            ['label' => 'Export', 'action' => 'export', 'icon' => 'file'],
            ['label' => 'Import', 'action' => 'import', 'icon' => 'import'],
        ]" />
        <x-ui.button wire:click="addRecord"><x-ui.icon.plus />Add</x-ui.button>
    </div>
</div>
