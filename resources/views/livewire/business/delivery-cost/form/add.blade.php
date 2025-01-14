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
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Jenis Kendaraan</label>
                        @error ('id_vehicle_type')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <select wire:model.live='id_vehicle_type' class='input-select @error('id_vehicle_type') input-state-error @enderror input-state-normal'>
                        <option value=''></option>
                        @foreach ($this->vehicleTypes as $vehicleType)
                            <option value='{{ $vehicleType->id }}'>{{ $vehicleType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Biaya Rute ke-1 {{ $cost_first ? ' - Rp' . number_format($cost_first, 0, ',', '.') : '' }}</label>
                        @error ('cost_first')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='cost_first' type='number' min='0' class='input-general @error('cost_first') input-state-error @enderror input-state-normal'>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Biaya Rute ke-2 {{ $cost_second ? ' - Rp' . number_format($cost_second, 0, ',', '.') : '' }}</label>
                        @error ('cost_second')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='cost_second' type='number' min='0' class='input-general @error('cost_second') input-state-error @enderror input-state-normal'>
                </div>
            </div>
        </div>

        <div class='py-5 px-10 sticky bottom-0 bg-white border-t flex justify-end items-center gap-2'>
            <button type='button' wire:click='resetForm' class='btn-ghost-stone'><i class='bi-backspace'></i>Reset</button>
            <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-plus-lg'></i>Tambah</button>
        </div>

    </form>

</div>