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
            <p class='font-semibold text-2xl'>Tambah</p>
        </div>

        <div class='overflow-auto'>
            <div class='py-5 px-10 flex flex-col gap-5'>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Tgl. Update</label>
                        @error ('datetime_updated')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='datetime_updated' type='datetime-local' class='input-general @error('datetime_updated') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Catatan</label>
                        @error ('note')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <textarea wire:model.live='note' rows='5' spellcheck='false' class='input-general @error('note') input-state-error @enderror input-state-normal'></textarea>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Biaya {{ $cost ? ' - Rp' . number_format($cost, 0, ',', '.') : '' }}</label>
                        @error ('cost')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='cost' type='number' min='0' class='input-general @error('cost') input-state-error @enderror input-state-normal'>
                    <p class='text-sm'>Kosongkan Apabila Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class='py-5 px-10 sticky bottom-0 bg-white border-t flex justify-end items-center gap-2'>
            <button type='button' wire:click='resetForm' class='btn-ghost-stone'><i class='bi-backspace'></i>Reset</button>
            <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-plus-lg'></i>Tambah</button>
        </div>

    </form>

</div>