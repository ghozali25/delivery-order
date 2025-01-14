@inject('carbon', 'Illuminate\Support\Carbon')

<div class='h-[100%] w-[100%] py-10 px-10 flex flex-col gap-5 overflow-auto'>

    @if (Auth::user()->can('update', $this->order) && !$this->order->closed)
        <div class='py-5 px-10 rounded-md shadow-md bg-white flex gap-2'>
            @if (!$this->order->confirmed)
                <div x-data='{showModal:false}'>
                    <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='bi-check-square'></i>Konfirmasi</button>
                    <livewire:order.form.edit-employee :order="$this->order->id" key="edit-employee" />
                </div>
            @endif
            @if ($this->order->confirmed)
                <div x-data='{showModal:false}'>
                    <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='{{ !$this->order->assigned ? 'bi-plus-lg' : 'bi-pencil-square' }}'></i>{{ !$this->order->assigned ? 'Tugaskan' : 'Ubah' }} Pengemudi & Kendaraan</button>
                    <livewire:order.form.edit-driver-vehicle :order="$this->order->id" key="edit-driver-vehicle-1" />
                </div>
            @endif
            @if ($this->order->datetime_confirmed && $this->order->datetime_assigned)
                <a href='{{ route('order.print-assignment-letter', ['order' => $this->order->id]) }}' target='_blank' class='btn-ghost-stone'>Cetak Surat Tugas</a>
            @endif
            @if ($this->order->datetime_confirmed && $this->order->datetime_assigned && !$this->order->closed)
                <div x-data='{showModal:false}'>
                    <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='bi-check-square'></i>Selesaikan</button>
                    <livewire:order.form.edit-status :order="$this->order->id" key="edit-status" />
                </div>
            @endif
        </div>
    @endif

    @if ($this->order->closed)
        <div class='py-5 px-10 rounded-md shadow-md bg-white flex gap-2'>
            <p class='font-bold text-lime-600 text-2xl'>PENGIRIMAN SELESAI</p>
        </div>
    @endif

    <div class='p-10 rounded-md shadow-md bg-white divide-y flex flex-col'>
        <div class='pb-5'>
            <p class='font-bold text-2xl'>{{ $pageTitle }}</p>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Mitra</p>
                <p class='text-xl'>{{ $this->order->client ? $this->order->client->name : '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Pengawas</p>
                <p class='text-xl'>{{ $this->order->employee ? $this->order->employee->name : '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Pengemudi</p>
                <p class='text-xl'>{{ $this->order->driver ? $this->order->driver->name : '-' }}</p>
            </div>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>No. Kendaraan</p>
                <p class='text-xl'>{{ $this->order->vehicle ? $this->order->vehicle->plate : '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Jenis Kendaraan</p>
                <p class='text-xl'>{{ $this->order->vehicle && $this->order->vehicle->vehicle_type ? $this->order->vehicle->vehicle_type->name : '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Nama Barang</p>
                <p class='text-xl'>{{ $this->order->cargo_name ?? '-' }}</p>
            </div>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Berat Barang</p>
                <p class='text-xl'>{{ $this->order->cargo_weight_kg ?? '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Area Tujuan</p>
                <p class='text-xl'>
                    {{ $this->order->destination_area ? $this->order->destination_area->name : '-' }}
                    @if ($this->order->orders_next_destinations)
                        {{ ', ' }}
                        @foreach ($this->order->orders_next_destinations as $nextDestination)
                            {{ $nextDestination->destination_area->name }}
                            {{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    @endif
                </p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Total Biaya (Incl. Rute & Update)</p>
                <p class='text-xl'>Rp{{ $this->order->total_cost ? number_format($this->order->total_cost, 0, ',', '.') : '-' }}</p>
            </div>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='col-span-3 flex flex-col gap-2'>
                <p class='font-bold'>Catatan Barang</p>
                <p class='text-xl'>{{ $this->order->cargo_note ?? '-' }}</p>
            </div>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Nama Penerima</p>
                <p class='text-xl'>{{ $this->order->recipient_name ?? '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>No. Telepon Penerima</p>
                <p class='text-xl'>{{ $this->order->recipient_phone ?? '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Alamat Penerima</p>
                <p class='text-xl'>{{ $this->order->recipient_address ?? '-' }}</p>
            </div>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Tgl. Request</p>
                <p class='text-xl'>{{ $this->order->datetime_ordered ?? '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Tgl. Dikonfirmasi</p>
                <p class='text-xl'>{{ $this->order->datetime_confirmed ?? '-' }}</p>
            </div>
            <div class='flex flex-col gap-2'>
                <p class='font-bold'>Tgl. Ditugaskan</p>
                <p class='text-xl'>{{ $this->order->datetime_assigned ?? '-' }}</p>
            </div>
        </div>
        <div class='py-5 grid grid-cols-3 gap-5'>
            <div class='col-span-3 flex flex-col gap-2'>
                <p class='font-bold'>Tgl. Selesai</p>
                <p class='text-xl'>{{ $this->order->datetime_closed ?? '-' }}</p>
            </div>
        </div>
    </div>

    <div class='flex flex-col gap-2'>
        <div class='flex justify-end items-center gap-2'>
            @if (Auth::user()->can('create', App\Models\OrderUpdate::class) && !$this->order->closed)
                <div x-data='{showModal:false}'>
                    <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='bi-plus-lg'></i>Update</button>
                    <livewire:order.form.add-update :order="$this->order->id" key="add-update" />
                </div>
            @endif
        </div>
        @if (!$this->order->orders_updates->count() === 0)
            <div class='p-10 rounded-md shadow-md bg-white flex justify-center gap-2'>
                <p>Belum ada update terkait pengiriman.</p>
            </div>
        @endif
        @foreach ($this->order->orders_updates as $orderUpdate)
            <div wire:key='row-update-{{ $orderUpdate->id }}' class='p-10 rounded-md shadow-md bg-white flex flex-col gap-2'>
                <div class='flex justify-between gap-2'>
                    <div class='flex flex-col'>
                        <p class='font-semibold text-xl'>{{ $carbon->parse($orderUpdate->datetime_updated)->isoFormat('DD MMMM YYYY HH:mm') }}</p>
                        <p class='font-semibold'>Rp{{ $orderUpdate->cost ? number_format($orderUpdate->cost, 0, ',', '.') : '-' }}</p>
                    </div>
                    @if (Auth::user()->can('update', $orderUpdate) && !$this->order->closed)
                        <div x-data='{showModal:false}'>
                            <button type='button' x-on:click='showModal=true' class='btn-stone'><i class='bi-plus-lg'></i>Edit</button>
                            <livewire:order.form.edit-update :orderUpdate="$orderUpdate->id" :key="'edit-update-' . $orderUpdate->id" />
                        </div>
                    @endif
                </div>
                <p>{{ $orderUpdate->note }}</p>
            </div>
        @endforeach
    </div>

</div>
