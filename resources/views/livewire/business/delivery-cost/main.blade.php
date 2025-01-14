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
                    <livewire:business.delivery-cost.form.add key="add" />
                </div>
            </div>
        </div>

        <div class='rounded-md border overflow-auto'>
            <table class='w-[100%]'>
                <thead>
                    <tr class='bg-stone-300'>
                        <th class='w-1'></th>
                        <th wire:click='updateFilterSort("destination_areas.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Area Tujuan
                                @if ($filterSortBy === 'destination_areas.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("vehicle_types.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Jenis Kendaraan
                                @if ($filterSortBy === 'vehicle_types.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("cost_first")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Biaya Rute ke-1
                                @if ($filterSortBy === 'cost_first')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("cost_second")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Biaya Rute ke-2
                                @if ($filterSortBy === 'cost_second')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->deliveryCosts as $deliveryCost)
                        <tr wire:key='row-{{ $deliveryCost->id }}' class='hover:bg-stone-100 border-y'>
                            <td class='p-2'>
                                <div class='flex items-center'>
                                    <div x-data='{showModal:false}'>
                                        <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-stone'><i class='bi-pencil-square'></i></button>
                                        <livewire:business.delivery-cost.form.edit :deliveryCost="$deliveryCost->id" :key="'edit-' . $deliveryCost->id" />
                                    </div>
                                    <div x-data='{showModal:false}'>
                                        <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-red'><i class='bi-trash'></i></button>
                                        <livewire:business.delivery-cost.form.delete :deliveryCost="$deliveryCost->id" :key="'delete-' . $deliveryCost->id" />
                                    </div>
                                </div>
                            </td>
                            <td class='p-2'>{{ $deliveryCost->destination_area ? $deliveryCost->destination_area->name : '-' }}</td>
                            <td class='p-2'>{{ $deliveryCost->vehicle_type ? $deliveryCost->vehicle_type->name : '-' }}</td>
                            <td class='p-2'>{{ $deliveryCost->cost_first ? 'Rp' . number_format($deliveryCost->cost_first, 0, ',', '.') : '-' }}</td>
                            <td class='p-2'>{{ $deliveryCost->cost_second ? 'Rp' . number_format($deliveryCost->cost_second, 0, ',', '.') : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $this->deliveryCosts->links() }}

    </div>

</div>
