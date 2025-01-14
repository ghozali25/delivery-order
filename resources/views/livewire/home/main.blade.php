<div class='w-[100%] flex flex-col'>
    
    @include('livewire.home.partial.navigation')

    <div class='w-[100%] min-h-[350px] flex flex-col justify-center items-center gap-5'>
        {{-- <p class='font-bold text-red-600 text-8xl'>{{ $this->companyProfile->abbreviation }}</p> --}}
        <img src='{{ Storage::url('logo.png') }}' class='max-w-[15%]'>
        <p class='font-bold text-sky-600 text-5xl'>{{ strtoupper($this->companyProfile->name) }}</p>
    </div>

    <div class='py-10 px-24 grid grid-cols-2 gap-10'>
        <div class='p-10 rounded-md shadow-md bg-white divide-y flex flex-col gap-5'>
            <p class='font-semibold text-3xl'>Tentang Kami</p>
            <p class='py-5 text-xl leading-relaxed'>{{ $this->companyProfile->about }}</p>
        </div>
        <div class='p-10 rounded-md shadow-md bg-white divide-y flex flex-col gap-5'>
            <p class='font-semibold text-3xl'>Hubungi Kami</p>
            <div class='py-5 flex flex-col gap-5'>
                <div class='flex items-center gap-5'>
                    <i class='bi-envelope text-3xl'></i>
                    <p class='text-2xl'>{{ $this->companyProfile->email ?? '-' }}</p>
                </div>
                <div class='flex items-center gap-5'>
                    <i class='bi-phone text-3xl'></i>
                    <p class='text-2xl'>{{ $this->companyProfile->phone ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
