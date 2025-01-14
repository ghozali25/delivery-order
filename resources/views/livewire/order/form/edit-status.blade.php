<div
x-cloak
x-show='showModal'
x-on:keyup.escape.window='showModal=false'
class='h-[100vh] w-[100vw] fixed top-0 left-0 z-50 bg-stone-800/25 flex justify-center items-center'>

    <form
    wire:submit='submitForm'
    x-on:click.outside='showModal=false'
    class='max-h-[95%] min-w-[350px] rounded-md shadow-md bg-white flex flex-col overflow-auto'>

        <div class='py-5 px-10 sticky top-0 bg-white border-b flex flex-col'>
            <p class='font-semibold text-2xl'>Konfirmasi Selesai</p>
        </div>

        <div class='overflow-auto'>
            <div class='py-5 px-10 flex flex-col gap-5'>
                <p>Nyatakan selesai?</p>
            </div>
        </div>

        <div class='py-5 px-10 sticky bottom-0 bg-white border-t flex justify-end items-center gap-2'>
            <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-check-square'></i>Konfirmasi</button>
        </div>

    </form>

</div>