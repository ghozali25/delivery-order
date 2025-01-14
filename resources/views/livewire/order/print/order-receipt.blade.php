@inject('carbon', 'Illuminate\Support\Carbon')

<div class='h-[100%] w-[100%] flex flex-col items-center gap-10'>

    <div class='p-5 fixed top-5 right-5 rounded-md shadow-md bg-white border border-stone-800 opacity-25 hover:opacity-100 flex items-center gap-2 hidden-print'>
        <p>Dari</p>
        <input wire:model.live='filterFromDate' type='date' class='input-general input-state-normal'>
        <p>Hingga</p>
        <input wire:model.live='filterToDate' type='date' class='input-general input-state-normal'>
        <button type='button' x-on:click='window.print()' class='btn-stone'><i class='bi-print'></i>Print</button>
    </div>

    <div class='w-[100%] flex items-center gap-5'>
        <p class='font-bold text-8xl'>{{ $this->companyProfile->abbreviation }}</p>
        <p class='font-bold text-5xl'>{{ $this->companyProfile->name }}</p>
    </div>

    <div class='w-[100%] flex justify-center'>
        <p class='font-bold text-3xl'>Tagihan {{ $this->client->name }} Periode {{ $carbon->parse($filterFromDate)->isoFormat('DD MMMM YYYY') }} s/d {{ $carbon->parse($filterToDate)->isoFormat('DD MMMM YYYY') }}</p>
    </div>

    <table class='w-[100%]'>
        <thead>
            <tr>
                <th class='p-2 border border-stone-800 align-top text-left'>Tanggal</th>
                <th class='p-2 border border-stone-800 align-top text-left'>No. Polisi</th>
                <th class='p-2 border border-stone-800 align-top text-left'>Jenis</th>
                <th class='p-2 border border-stone-800 align-top text-left'>Supir</th>
                <th class='p-2 border border-stone-800 align-top text-left'>No. Surat Jalan</th>
                <th class='p-2 border border-stone-800 align-top text-left'>Tujuan</th>
                <th class='p-2 border border-stone-800 align-top text-left'>Tarif</th>
                <th class='p-2 border border-stone-800 align-top text-left'>Tarif Tambahan</th>
                <th class='p-2 border border-stone-800 align-top text-left'>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->orders as $order)
                <tr>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>{{ $carbon->parse($order->datetime_assigned)->isoFormat('DD MMMM YYYY') }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>{{ $order->vehicle->plate }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>{{ $order->vehicle->vehicle_type->name }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>{{ $order->driver->name }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>{{ $order->order_no }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left'>{{ $order->destination_area->name }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left'>Rp{{ number_format($order->cost, 0, ',', '.') }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>Rp{{ number_format($order->update_cost, 0, ',', '.') }}</td>
                    <td class='p-2 border border-stone-800 align-top text-left' rowspan='{{ 1 + $order->orders_next_destinations->count() }}'>Rp{{ number_format($order->total_cost, 0, ',', '.') }}</td>
                </tr>
                @foreach ($order->orders_next_destinations as $nextDestination)
                    <tr>
                        <td class='p-2 border border-stone-800 align-top text-left'>{{ $nextDestination->destination_area->name }}</td>
                        <td class='p-2 border border-stone-800 align-top text-left'>Rp{{ number_format($nextDestination->cost, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <th class='p-2 border border-stone-800 align-top text-right' colspan='8'>Total</th>
                <td class='p-2 border border-stone-800 align-top text-left'>Rp{{ number_format($this->totalCost, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

</div>