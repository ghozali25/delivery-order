<div class='h-[100%] w-[300px] bg-white flex flex-col justify-between overflow-auto'>
    
    <div class='flex flex-col overflow-auto'>

        <div class='w-[100%] py-5 sticky top-0 bg-stone-800 border-b flex justify-center items-center gap-5'>
            <p class='font-bold text-white text-6xl'>{{ $this->companyProfile->abbreviation }}</p>
            <div class='flex flex-col'>
                @foreach ($this->companyProfileNameExploded as $word)
                    <p class='font-bold text-white text-2xl'>{{ $word }}</p>
                @endforeach
            </div>
        </div>

        @if ($this->authenticatedUser->role->abbreviation !== 'CLN')
            <div class='w-[100%] flex flex-col overflow-auto [&::-webkit-scrollbar]:hidden'>
                @if ($this->authenticatedUser->role->abbreviation === 'ADMIN' || $this->authenticatedUser->role->abbreviation === 'STAFF')
                    <a href='{{ route('order') }}' wire:navigate class='btn-navigation {{ $this->currentRouteName === 'order' ? 'bg-stone-800 text-white' : '' }}'>Pengiriman</a>
                @endif
                @if ($this->authenticatedUser->role->abbreviation === 'ADMIN' || $this->authenticatedUser->role->abbreviation === 'STAFF')
                    <div x-data='{showSubmenu1:false}' class='flex flex-col'>
                        <button type='button' x-on:click='showSubmenu1=!showSubmenu1' class='btn-navigation justify-between {{ str_contains($this->currentRouteName, 'business.') ? 'bg-stone-800 text-white' : '' }}'>Data Bisnis<i :class='showSubmenu1 ? "bi-chevron-up" : "bi-chevron-down"'></i></button>
                        <div x-cloak x-collapse x-show='showSubmenu1'>
                            <div class='py-2 ml-5 border-l-4 border-stone-800 flex flex-col gap-2'>
                                <a href='{{ route('business.client') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'business.client' ? 'bg-stone-300' : '' }}'>Mitra</a>
                                <a href='{{ route('business.delivery-cost') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'business.delivery-cost' ? 'bg-stone-300' : '' }}'>Biaya Sewa</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($this->authenticatedUser->role->abbreviation === 'ADMIN' || $this->authenticatedUser->role->abbreviation === 'STAFF')
                    <div x-data='{showSubmenu2:false}' class='flex flex-col'>
                        <button type='button' x-on:click='showSubmenu2=!showSubmenu2' class='btn-navigation justify-between {{ str_contains($this->currentRouteName, 'resource.') ? 'bg-stone-800 text-white' : '' }}'>Data Perusahaan<i :class='showSubmenu2 ? "bi-chevron-up" : "bi-chevron-down"'></i></button>
                        <div x-cloak x-collapse x-show='showSubmenu2'>
                            <div class='py-2 ml-5 border-l-4 border-stone-800 flex flex-col gap-2'>
                                <a href='{{ route('resource.employee') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'resource.employee' ? 'bg-stone-300' : '' }}'>Pegawai</a>
                                <a href='{{ route('resource.driver') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'resource.driver' ? 'bg-stone-300' : '' }}'>Pengemudi</a>
                                <a href='{{ route('resource.vehicle') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'resource.vehicle' ? 'bg-stone-300' : '' }}'>Kendaraan</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($this->authenticatedUser->role->abbreviation === 'ADMIN')
                    <div x-data='{showSubmenu3:false}' class='flex flex-col'>
                        <button type='button' x-on:click='showSubmenu3=!showSubmenu3' class='btn-navigation justify-between {{ str_contains($this->currentRouteName, 'lookup.') ? 'bg-stone-800 text-white' : '' }}'>Data Pilihan<i :class='showSubmenu3 ? "bi-chevron-up" : "bi-chevron-down"'></i></button>
                        <div x-cloak x-collapse x-show='showSubmenu3'>
                            <div class='py-2 ml-5 border-l-4 border-stone-800 flex flex-col gap-2'>
                                <a href='{{ route('lookup.vehicle-type') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'lookup.vehicle-type' ? 'bg-stone-300' : '' }}'>Jenis Kendaraan</a>
                                <a href='{{ route('lookup.destination-area') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'lookup.destination-area' ? 'bg-stone-300' : '' }}'>Area Tujuan</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @else
            <a href='{{ route('order.request') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'order.request' ? 'bg-stone-300' : '' }}'>Form Request</a>
            <a href='{{ route('order') }}' wire:navigate class='ml-5 btn-navigation rounded-l-full {{ $this->currentRouteName === 'order' || $this->currentRouteName === 'order.detail' ? 'bg-stone-300' : '' }}'>Request Saya</a>
        @endif

    </div>

    <div class='w-[100%] sticky bottom-0 bg-white border-t flex flex-col'>

        @if ($this->authenticatedUser->role->abbreviation !== 'ADMIN')
            <div x-data='{showModal:false}'>
                <button type='button' x-on:click='showModal=true' class='w-[100%] btn-navigation'><i class='bi-person-circle'></i>{{ $this->authenticatedUser->email }}</button>
                @if ($this->authenticatedUser->role->abbreviation === 'CLN')
                    <livewire:authentication.form.edit-profile-client key='edit-profile-client' />
                @else
                    <livewire:authentication.form.edit-profile-employee key='edit-profile-employee' />
                @endif
            </div>
        @else
            <div x-data='{showModal:false}'>
                <button type='button' x-on:click='showModal=true' class='w-[100%] btn-navigation'><i class='bi-person-circle'></i>{{ $this->authenticatedUser->email }}</button>
                <livewire:business.company-profile.form.edit key='edit-profile-company' />
            </div>
        @endif
        
        <div x-data='{showModal:false}'>
            <button type='button' x-on:click='showModal=true' class='w-[100%] btn-navigation'><i class='bi-gear'></i>Ubah Password</button>
            <livewire:authentication.form.edit-password key='edit-password' />
        </div>
        <div x-data='{showModal:false}'>
            <button type='button' x-on:click='showModal=true' class='w-[100%] btn-navigation-red'><i class='bi-power'></i>Log Out</button>
            <livewire:authentication.form.logout key='logout' />
        </div>

    </div>

</div>