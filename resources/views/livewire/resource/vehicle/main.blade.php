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
                    <livewire:resource.vehicle.form.add key="add" />
                </div>
            </div>
        </div>

        <div class='rounded-md border overflow-auto'>
            <table class='w-[100%]'>
                <thead>
                    <tr class='bg-stone-300'>
                        <th class='w-1'></th>
                        <th wire:click='updateFilterSort("plate")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Plat
                                @if ($filterSortBy === 'plate')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("vehicle_types.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Jenis
                                @if ($filterSortBy === 'vehicle_types.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("brand")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Merek
                                @if ($filterSortBy === 'brand')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("model")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Model
                                @if ($filterSortBy === 'model')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("color")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Warna
                                @if ($filterSortBy === 'color')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th class='p-2 hover:bg-stone-400 text-left cursor-pointer'>Disewa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->vehicles as $vehicle)
                        <tr wire:key='row-{{ $vehicle->id }}' class='hover:bg-stone-100 border-y'>
                            <td class='p-2'>
                                <div class='flex items-center'>
                                    <div x-data='{showModal:false}'>
                                        <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-stone'><i class='bi-pencil-square'></i></button>
                                        <livewire:resource.vehicle.form.edit :vehicle="$vehicle->id" :key="'edit-' . $vehicle->id" />
                                    </div>
                                    <div x-data='{showModal:false}'>
                                        <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-red'><i class='bi-trash'></i></button>
                                        <livewire:resource.vehicle.form.delete :vehicle="$vehicle->id" :key="'delete-' . $vehicle->id" />
                                    </div>
                                </div>
                            </td>
                            <td class='p-2'>{{ $vehicle->plate ?? '-' }}</td>
                            <td class='p-2'>{{ $vehicle->vehicle_type ? $vehicle->vehicle_type->name : '-' }}</td>
                            <td class='p-2'>{{ $vehicle->brand ?? '-' }}</td>
                            <td class='p-2'>{{ $vehicle->model ?? '-' }}</td>
                            <td class='p-2'>{{ $vehicle->color ?? '-' }}</td>
                            <td class='p-2 {{ $vehicle->on_delivery ? 'bg-yellow-300' : '' }}'>{{ $vehicle->on_delivery ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $this->vehicles->links() }}

    </div>

</div>
