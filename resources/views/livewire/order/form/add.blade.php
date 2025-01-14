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
                        <label class='font-semibold'>Mitra</label>
                        @error ('id_client')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <select wire:model.live='id_client' class='input-select @error('id_client') input-state-error @enderror input-state-normal'>
                        <option value=''></option>
                        @foreach ($this->clients as $client)
                            <option value='{{ $client->id }}'>{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Nama Barang</label>
                        @error ('cargo_name')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='cargo_name' type='text' spellcheck='false' class='input-general @error('cargo_name') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Berat Barang (Kg)</label>
                        @error ('cargo_weight_kg')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='cargo_weight_kg' type='number' min='0' class='input-general @error('cargo_weight_kg') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Deskripsi/Catatan Barang</label>
                        @error ('cargo_note')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <textarea wire:model.live='cargo_note' rows='5' spellcheck='false' class='input-general @error('cargo_note') input-state-error @enderror input-state-normal'></textarea>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Nama Penerima</label>
                        @error ('recipient_name')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='recipient_name' type='text' spellcheck='false' class='input-general @error('recipient_name') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>No. Telepon Penerima</label>
                        @error ('recipient_phone')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='recipient_phone' type='tel' spellcheck='false' class='input-general @error('recipient_phone') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Alamat Penerima</label>
                        @error ('recipient_address')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <textarea wire:model.live='recipient_address' rows='5' spellcheck='false' class='input-general @error('recipient_address') input-state-error @enderror input-state-normal'></textarea>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Area Tujuan</label>
                        @error ('id_destination_area')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <select wire:model.live='id_destination_area' class='input-select @error('id_destination_area') input-state-error @enderror input-state-normal'>
                        <option value=''></option>
                        @foreach ($this->destinationAreas as $destinationArea)
                            <option value='{{ $destinationArea->id }}'>{{ $destinationArea->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class='py-5 px-10 sticky bottom-0 bg-white border-t flex justify-end items-center gap-2'>
            <button type='button' wire:click='resetForm' class='btn-ghost-stone'><i class='bi-backspace'></i>Reset</button>
            <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-plus-lg'></i>Tambah</button>
        </div>

    </form>

</div>