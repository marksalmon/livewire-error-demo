<div class="p-2 bg-gray-500">
    <div class="flex justify-between">
        <div class="w-2/3 flex items-end">
            <button
            wire:click="addRule"
            class="h-12 px-4 py-3 rounded bg-red-600 text-white"
            >ADD RULE</button>

            <button
            wire:click="addGroup"
            class="h-12 ml-2 px-4 py-3 rounded bg-red-600 text-white"
            >ADD GROUP</button>
        </div>
        <div class="w-1/3">
            <label class="block uppercase tracking-wide text-gray-100 text-xs font-bold py-1 rounded flex justify-between">Condition</label>
            <div class="relative">
                <select
                    wire:model="condition"
                    class="w-full h-full p-2 pr-8 appearance-none leading-tight bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white"
                >
                    <option></option>
                    <option value="and">AND</option>
                    <option value="or">OR</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>
    </div>
    @foreach($children as $key => $child)
        @if($child['type'] === 'group')
            <div class="mt-4 border-2 border-gray-600 rounded shadow-md"><label class="p-2 -mb-4 block uppercase tracking-wide text-gray-100 font-bold py-1 rounded flex justify-between">group</label>
                @livewire('query-builder-group-without', $id, $key+1, $fields, key('group' . $key))
            </div>
        @elseif($child['type'] === 'rule')
            @livewire('query-builder-rule', $id, $key+1, $fields, key('rule' . $key))
        @endif
    @endforeach
</div>
