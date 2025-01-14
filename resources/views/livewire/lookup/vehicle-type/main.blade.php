<div class='h-[100%] w-[100%] py-10 px-10 flex flex-col gap-5 overflow-auto'>
    
    <div class='p-10 rounded-md shadow-md bg-white flex flex-col gap-5'>

        <div class='flex justify-between items-center gap-2'>
            <p class='font-bold text-2xl'>{{ $pageTitle }}</p>
            <div class='flex items-center gap-2'>
                <select wire:model.live='filterPaginate' class='input-select input-state-normal'>
                    <option value='25'>25</option>
                    <option value='50'>50</option>
                    <option value='75'>75</option>
                    <option value='100'>100</option>
                </select>
                <input wire:model.live='filterSearch' type='text' class='input-general input-state-normal'>
                <div x-data='{showModal:false}'>
                    <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='bi-plus-lg'></i>Tambah</button>
                    <livewire:lookup.vehicle-type.form.add key="add" />
                </div>
            </div>
        </div>

        <div class='rounded-md border overflow-auto'>
            <table class='w-[100%]'>
                <thead>
                    <tr class='bg-stone-300'>
                        <th class='w-1'></th>
                        <th wire:click='updateFilterSort("abbreviation")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Singkatan
                                @if ($filterSortBy === 'abbreviation')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Nama
                                @if ($filterSortBy === 'name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("max_cargo_weight_kg")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Maks. Bobot Beban (Ton)
                                @if ($filterSortBy === 'max_cargo_weight_kg')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->vehicleTypes as $vehicleType)
                        <tr wire:key='row-{{ $vehicleType->id }}' class='hover:bg-stone-100 border-y'>
                            <td class='p-2'>
                                <div class='flex items-center'>
                                    <div x-data='{showModal:false}'>
                                        <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-stone'><i class='bi-pencil-square'></i></button>
                                        <livewire:lookup.vehicle-type.form.edit :vehicleType="$vehicleType->id" :key="'edit-' . $vehicleType->id" />
                                    </div>
                                    <div x-data='{showModal:false}'>
                                        <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-red'><i class='bi-trash'></i></button>
                                        <livewire:lookup.vehicle-type.form.delete :vehicleType="$vehicleType->id" :key="'delete-' . $vehicleType->id" />
                                    </div>
                                </div>
                            </td>
                            <td class='p-2'>{{ $vehicleType->abbreviation ?? '-' }}</td>
                            <td class='p-2'>{{ $vehicleType->name ?? '-' }}</td>
                            <td class='p-2'>{{ $vehicleType->max_cargo_weight_kg ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $this->vehicleTypes->links() }}

    </div>

</div>
