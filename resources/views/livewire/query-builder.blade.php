<div class="mt-4 p-2 bg-gray-600 rounded shadow-inner">
    <label class="uppercase tracking-wide text-gray-100 text-lg font-bold">QUERY BUILDER</label>

    <div class="my-2">
        @livewire('query-builder-group', null, 0, $fields)
    </div>

    <pre class="p-4 my-4 bg-gray-800 text-purple-400">{{ $formattedRules }}</pre>

    <div class="flex justify-between">
        <button wire:click="doQuery" class="px-4 py-3 bg-gray-100 rounded">ADD QUERY</button>
    </div>
</div>
