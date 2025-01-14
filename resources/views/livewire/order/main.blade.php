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
                @if (Auth::user()->can('create', App\Models\Order::class))
                    <div x-data='{showModal:false}'>
                        <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='bi-plus-lg'></i>Tambah</button>
                        <livewire:order.form.add key="add" />
                    </div>
                @endif
            </div>
        </div>

        <div class='rounded-md border overflow-auto'>
            <table class='w-[100%]'>
                <thead>
                    <tr class='bg-stone-300'>
                        <th class='w-1'></th>
                        <th wire:click='updateFilterSort("datetime_ordered")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Tgl. Request
                                @if ($filterSortBy === 'datetime_ordered')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("id")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>No. Pengiriman
                                @if ($filterSortBy === 'id')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("clients.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Mitra
                                @if ($filterSortBy === 'clients.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("employees.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Pengawas
                                @if ($filterSortBy === 'employees.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("drivers.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Pengemudi
                                @if ($filterSortBy === 'drivers.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("vehicles.plate")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Plat
                                @if ($filterSortBy === 'vehicles.plate')
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
                        <th wire:click='updateFilterSort("cargo_name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Barang
                                @if ($filterSortBy === 'cargo_name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("cargo_weight_kg")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Berat (Kg)
                                @if ($filterSortBy === 'cargo_weight_kg')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("recipient_address")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Alamat Penerima
                                @if ($filterSortBy === 'recipient_address')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("destination_areas.name")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Area Tujuan
                                @if ($filterSortBy === 'destination_areas.name')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th class='p-2 hover:bg-stone-400 text-left cursor-pointer'>Status</th>
                        <th wire:click='updateFilterSort("datetime_confirmed")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Tgl. Dikonfirmasi
                                @if ($filterSortBy === 'datetime_confirmed')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("datetime_assigned")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Tgl. Ditugaskan
                                @if ($filterSortBy === 'datetime_assigned')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                        <th wire:click='updateFilterSort("datetime_closed")' class='p-2 hover:bg-stone-400 text-left cursor-pointer'>
                            <div class='flex items-center gap-2'>Tgl. Selesai
                                @if ($filterSortBy === 'datetime_closed')
                                    <i :class='$wire.filterSortDesc ? "bi-chevron-down" : "bi-chevron-up"'></i>
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->orders as $order)
                        <tr wire:key='row-{{ $order->id }}' class='hover:bg-stone-100 border-y'>
                            <td class='p-2'>
                                <div class='flex items-center'>
                                    @if (Auth::user()->can('forceDelete', $order))
                                        <div x-data='{showModal:false}'>
                                            <button type='button' x-on:click='showModal=true' class='btn-ghost-icon-red'><i class='bi-trash'></i></button>
                                            <livewire:order.form.delete :order="$order->id" :key="'delete-' . $order->id" />
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class='p-2'>{{ $order->datetime_ordered ?? '-' }}</td>
                            <td class='p-2'>
                                <a href='{{ route('order.detail', ['order' => $order->id]) }}' wire:navigate class='anchor'>{{ $order->order_no ?? '-' }}</a>
                            </td>
                            <td class='p-2'>{{ $order->client ? $order->client->name : '-' }}</td>
                            <td class='p-2'>{{ $order->employee ? $order->employee->name : '-' }}</td>
                            <td class='p-2'>{{ $order->driver ? $order->driver->name : '-' }}</td>
                            <td class='p-2'>{{ $order->vehicle ? $order->vehicle->plate : '-' }}</td>
                            <td class='p-2'>{{ $order->vehicle && $order->vehicle->vehicle_type ? $order->vehicle->vehicle_type->name : '-' }}</td>
                            <td class='p-2'>{{ $order->cargo_name ?? '-' }}</td>
                            <td class='p-2'>{{ $order->cargo_weight_kg ?? '-' }}</td>
                            <td class='p-2'>{{ $order->recipient_address ?? '-' }}</td>
                            <td class='p-2'>
                                {{ $order->destination_area->name }}
                                @if ($order->orders_next_destinations)
                                    {{ ', ' }}
                                    @foreach ($order->orders_next_destinations as $nextDestination)
                                        {{ $nextDestination->destination_area->name }}
                                        {{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @endif
                            </td>
                            @if (!$order->confirmed)
                                <td class='p-2 bg-red-300'>Menunggu Konfirmasi</td>
                            @elseif ($order->confirmed)
                                <td class='p-2 bg-yellow-300'>Dikonfirmasi Pengawas</td>
                            @elseif ($order->assigned)
                                <td class='p-2 bg-sky-300'>Pengemudi Ditugaskan</td>
                            @elseif ($order->closed)
                                <td class='p-2 bg-lime-300'>Selesai</td>
                            @endif
                            <td class='p-2'>{{ $order->datetime_confirmed ?? '-' }}</td>
                            <td class='p-2'>{{ $order->datetime_assigned ?? '-' }}</td>
                            <td class='p-2'>{{ $order->datetime_closed ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $this->orders->links() }}

    </div>

</div>
