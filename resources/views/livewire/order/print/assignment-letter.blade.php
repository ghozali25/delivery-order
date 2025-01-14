@inject('carbon', 'Illuminate\Support\Carbon')

<div class='h-[100%] w-[100%] flex flex-col items-center gap-10'>

    <div class='p-5 fixed top-5 right-5 rounded-md shadow-md bg-white border border-stone-800 opacity-25 hover:opacity-100 flex items-center gap-2 hidden-print'>
        <button type='button' x-on:click='window.print()' class='btn-stone'><i class='bi-print'></i>Print</button>
    </div>

    <div class='w-[100%] flex justify-between items-center'>
        <div class='flex items-center gap-5'>
            <p class='font-bold text-8xl'>{{ $this->companyProfile->abbreviation }}</p>
            <div class='flex flex-col gap-2'>
                <p class='font-bold text-5xl'>{{ $this->companyProfile->name }}</p>
                <p>{{ $this->companyProfile->address }}</p>
                <p>Telp. {{ $this->companyProfile->phone }}</p>
            </div>
        </div>
        <div class='flex items-center gap-5'>
            <p class='font-semibold text-3xl'>No.</p>
            <p class='font-semibold text-3xl'>{{ $this->order->order_no }}</p>
        </div>
    </div>

    <div class='w-[100%] flex justify-center'>
        <p class='font-bold text-3xl'>SURAT TUGAS</p>
    </div>

    <table>
        <tbody>
            <tr>
                <td class='p-1'>Nama Pengemudi</td>
                <td class='p-1'>: {{ $this->order->driver ? $this->order->driver->name : '...........................................................................................................................................' }}</td>
            </tr>
            <tr>
                <td class='p-1'>Nama Pegawai</td>
                <td class='p-1'>: {{ $this->order->employee ? $this->order->employee->name : '...........................................................................................................................................' }}</td>
            </tr>
            <tr>
                <td class='p-1'>Tanggal</td>
                <td class='p-1'>: {{ $this->order->datetime_assigned ? $carbon->parse($this->order->datetime_assigned)->isoFormat('DD MMMM YYYY') : '...........................................................................................................................................' }}</td>
            </tr>
            <tr>
                <td class='p-1'>Hari</td>
                <td class='p-1'>: {{ $this->order->datetime_assigned ? $carbon->parse($this->order->datetime_assigned)->locale('id')->dayName : '...........................................................................................................................................' }}</td>
            </tr>
            <tr>
                <td class='p-1'>Jenis Mobil</td>
                <td class='p-1'>: {{ $this->order->vehicle && $this->order->vehicle->vehicle_type ? $this->order->vehicle->vehicle_type->name : '...........................................................................................................................................' }}</td>
            </tr>
            <tr>
                <td class='p-1'>No. Mobil</td>
                <td class='p-1'>: {{ $this->order->vehicle ? $this->order->vehicle->plate : '...........................................................................................................................................' }}</td>
            </tr>
        </tbody>
    </table>

    <div class='w-[100%] flex flex-col gap-5'>
        <p>Surat ini merupakan surat perintah tugas untuk pengambilan barang kiriman sbb:</p>
        <table class='w-[100%] table-fixed'>
            <thead>
                <tr>
                    <th class='p-2 border border-stone-800 align-top text-left'>Nama Barang</th>
                    <th class='p-2 border border-stone-800 align-top text-left'>Tujuan</th>
                    <th class='p-2 border border-stone-800 align-top text-left'>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr class='h-[100px]'>
                    <td class='p-2 border border-stone-800 align-top text-left'>{{ $this->order->cargo_name }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left'>
                        {{ $this->order->destination_area->name }}
                        @if ($this->order->orders_next_destinations)
                            {{ ', ' }}
                            @foreach ($this->order->orders_next_destinations as $nextDestination)
                                {{ $nextDestination->destination_area->name }}
                                {{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        @endif
                    </td>
                    <td class='p-2 border border-stone-800 align-top text-left'>{{ $this->order->cargo_note }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class='h-[175px] w-[100%] flex justify-around gap-2'>
        <div class='flex flex-col justify-between items-center gap-2'>
            <p>Pengemudi,</p>
            <div class='flex flex-col items-center'>
                <p>{{ $this->order->driver ? $this->order->driver->name : '( ................................................................ )' }}</p>
            </div>
        </div>
        <div class='flex flex-col justify-between items-center gap-2'>
            <div class='flex flex-col items-center'>
                <p>Tangerang, {{ $carbon->now()->isoFormat('DD MMMM YYYY') }}</p>
                <p>{{ $this->companyProfile->name }}</p>
            </div>
            <div class='flex flex-col items-center'>
                <p>{{ $this->order->employee ? $this->order->employee->name : '( ................................................................ )' }}</p>
            </div>
        </div>
    </div>

</div>