<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='csrf_token' value='{{ csrf_token() }}'/>

    <link rel='icon' href='{{ Storage::url('logo.png') }}' type='image/png'>
    <title>Manajemen Pengiriman Barang</title>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class='overflow-auto bg-stone-300'>
    <div class='h-[100vh] w-[100vw] flex'>
        @if(Auth::check() && !str_contains(Route::currentRouteName(), 'authentication'))
            <livewire:navigation.main />
        @endif
        {{ $slot }}
    </div>

    <div class='fixed z-50'>
        <x-toaster-hub />
    </div>
</body>

<script defer>
    Livewire.hook('request', ({ fail }) => { 
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault()
                window.location.href = '/login'
            }
        })
    })
</script>

</html>
