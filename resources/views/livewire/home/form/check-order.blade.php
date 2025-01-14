<div class='w-[100%] flex flex-col'>
    
    @include('livewire.home.partial.navigation')

    <div class='py-10 px-24 flex flex-col gap-10'>

        <form wire:submit='submitForm' class='p-10 rounded-md shadow-md bg-white flex flex-col gap-5'>
            <p class='font-semibold text-3xl'>No. Pengiriman</p>
            <div class='flex items-center gap-2'>
                <input wire:model='id_order' type='number' min='0' class='w-[100%] input-general input-state-normal'>
                <button type='submit' class='btn-stone'><i class='bi-search'></i>Cari</button>
            </div>
        </form>

        @if ($this->order)
            <div class='p-10 rounded-md shadow-md bg-white divide-y flex flex-col gap-5'>
                <div class='py-5'>
                    @if (!$this->order->datetime_confirmed)
                        <p class='font-semibold text-3xl'>Pesanan Anda belum dikonfirmasi.</p>
                    @elseif ($this->order->datetime_confirmed)
                        <p class='font-semibold text-3xl'>Pesanan Anda sudah dikonfirmasi oleh pengawas pesanan.</p>
                    @elseif ($this->order->datetime_assigned)
                        <p class='font-semibold text-3xl'>Driver sudah ditugaskan untuk menangani pesanan Anda.</p>
                    @elseif ($this->order->datetime_closed)
                        <p class='font-semibold text-3xl'>Pesanan Anda sudah selesai.</p>
                    @endif
                </div>
                <div class='py-5 grid grid-cols-4 gap-5'>
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
                    <div class='flex flex-col gap-2'>
                        <p class='font-bold'>Tgl. Selesai</p>
                        <p class='text-xl'>{{ $this->order->datetime_closed ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @endif

    </div>
    
</div>
