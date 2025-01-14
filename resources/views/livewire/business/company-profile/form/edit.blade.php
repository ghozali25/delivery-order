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
            <p class='font-semibold text-2xl'>Ubah</p>
        </div>

        <div class='overflow-auto'>
            <div class='py-5 px-10 flex flex-col gap-5'>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Singkatan</label>
                        @error ('abbreviation')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='abbreviation' type='text' spellcheck='false' class='input-general @error('abbreviation') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Nama</label>
                        @error ('name')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='name' type='text' spellcheck='false' class='input-general @error('name') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Alamat</label>
                        @error ('address')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <textarea wire:model.live='address' rows='5' spellcheck='false' class='input-general @error('address') input-state-error @enderror input-state-normal'></textarea>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Email</label>
                        @error ('email')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='email' type='email' spellcheck='false' class='input-general @error('email') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>No. Telepon</label>
                        @error ('phone')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='phone' type='tel' spellcheck='false' class='input-general @error('phone') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Tentang Kami</label>
                        @error ('about')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <textarea wire:model.live='about' rows='5' spellcheck='false' class='input-general @error('about') input-state-error @enderror input-state-normal'></textarea>
                </div>
            </div>
        </div>

        <div class='py-5 px-10 sticky bottom-0 bg-white border-t flex justify-end items-center gap-2'>
            <button type='button' wire:click='resetForm' class='btn-ghost-stone'><i class='bi-backspace'></i>Reset</button>
            <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-pencil-square'></i>Ubah</button>
        </div>

    </form>

</div>