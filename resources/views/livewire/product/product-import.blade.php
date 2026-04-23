<div>
    <x-common.component-card title="Import Products">
        <form wire:submit="import" id="import-form">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-800 dark:text-white/90">Download Demo Format</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Download the sample Excel file to understand
                        the correct data format for importing products.</p>
                </div>
                <x-ui.button type="button" wire:click="downloadDemo" variant="outline">
                    <x-ui.icon.file class="w-5 h-5" /> Download Demo
                </x-ui.button>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-800 pt-6">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Upload Excel
                        File</label>
                    <input type="file" wire:model="importFile" accept=".xlsx,.xls,.csv"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 dark:file:bg-gray-800 dark:file:text-gray-300 dark:hover:file:bg-gray-700 dark:text-gray-400 border border-gray-300 rounded-lg dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20" />

                    <div wire:loading wire:target="importFile" class="text-sm text-brand-500 mt-2">Uploading file...
                    </div>
                    @error('importFile')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-8">
                <x-ui.button type="button" variant="outline" wire:click="back">Cancel</x-ui.button>
                <x-ui.button type="submit" wire:loading.attr="disabled" wire:target="import, importFile">
                    <span wire:loading.remove wire:target="import">Import Products</span>
                    <span wire:loading wire:target="import">Importing...</span>
                </x-ui.button>
            </div>
        </form>
    </x-common.component-card>
</div>
