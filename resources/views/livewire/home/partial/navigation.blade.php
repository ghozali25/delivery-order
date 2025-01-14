<div class='py-3 px-5 sticky top-0 shadow-md bg-white flex justify-between items-center gap-2'>
    <div class='flex items-center gap-2'>
        <a href='{{ route('home') }}' wire:navigate class='btn-stone'><i class='bi-house'></i>Home</a>
        <a href='{{ route('home.check-order') }}' wire:navigate class='btn-stone'><i class='bi-search'></i>Cek Status Pengiriman</a>
    </div>
    <div class='flex items-center gap-2'>
        <a href='{{ route('authentication.login') }}' wire:navigate class='btn-stone'><i class='bi-box-arrow-in-right'></i>Log In</a>
    </div>
</div>