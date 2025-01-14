<div class='h-[100%] w-[100%] py-10 px-10 flex flex-col gap-5 overflow-auto'>
    
    <div class='p-10 rounded-md shadow-md bg-white flex flex-col gap-5'>

        <div class='flex justify-between items-center gap-2'>
            <p class='font-bold text-2xl'>{{ $pageTitle }}</p>
        </div>

        <form wire:submit='submitForm' class='flex flex-col gap-5'>

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

            <div class='flex justify-end items-center gap-2'>
                <button type='button' wire:click='resetForm' class='btn-ghost-stone'><i class='bi-backspace'></i>Reset</button>
                <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-send'></i>Kirim</button>
            </div>

        </form>

    </div>

</div>
