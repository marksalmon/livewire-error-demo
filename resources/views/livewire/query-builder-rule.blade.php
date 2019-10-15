<div class="mt-4 p-2 rounded text-gray-800 bg-gray-300">
    <label class="w-full block uppercase tracking-wide font-bold py-1 rounded flex justify-between">rule</label>
    <div class="-mx-2 flex flex-wrap justify-between">
        <div class="w-1/3 p-2">
            <label class="block uppercase tracking-wide text-xs font-bold py-1 rounded flex justify-between">Field</label>

            <div class="relative">
                <select
                    name="selectedField"
                    wire:change="setField($event.target.value)"
                    class="w-full h-full p-2 pr-8 appearance-none leading-tight bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white"
                >
                    <option value=""></option>
                    @foreach($fields as $field)
                        <option value="{{ $field['id'] }}">{{ $field['name'] }}</option>
                    @endforeach
                </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>
    </div>

    @unless($valueFieldHidden)
    <div class="w-1/3 p-2">
        <label class="block uppercase tracking-wide text-xs font-bold py-1 rounded flex justify-between">Operand</label>
        <div class="relative">
            <select
            name="operand"
            wire:change="setOperand($event.target.value)"
            class="w-full h-full p-2 pr-8 appearance-none leading-tight bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white"
            >
            <option selected></option>
            @foreach($operands as $operand)
            <option value="{{ $operand }}">{{ $operand }}</option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
        </div>
    </div>
</div>
@endunless

<div class="w-1/3 p-2">
    <label class="block uppercase tracking-wide text-xs font-bold py-1 rounded flex justify-between">Value</label>
    @unless($valueFieldHidden || $valueOptions)
    <input
    @if($isDate) type="date" @endif
    name="value"
    wire:change="setValue($event.target.value)"
    class="w-full p-2 pr-8 rounded leading-tight bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white"
    />
    @else
    <div class="relative">
        <select
        name="value"
        wire:change="setValue($event.target.value)"
        class="w-full h-full p-2 pr-8 appearance-none leading-tight bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white"
        >
        <option selected></option>
        @isset($valueOptions)
        @foreach($valueOptions as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
        @else
        <option value="true">True</option>
        <option value="false">False</option>
        @endisset
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
    </div>
</div>
@endunless
</div>
@if($valueFieldHidden)
<div class="w-1/3 p-2"></div>
@endif
</div>
</div>
