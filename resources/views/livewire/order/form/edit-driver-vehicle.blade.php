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
            <p class='font-semibold text-2xl'>Tugaskan</p>
        </div>

        <div class='overflow-auto'>
            <div class='py-5 px-10 flex flex-col gap-5'>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Pengemudi</label>
                        @error ('id_driver')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <select wire:model.live='id_driver' class='input-select @error('id_driver') input-state-error @enderror input-state-normal'>
                        <option value=''></option>
                        @foreach ($this->availableDrivers as $driver)
                            <option value='{{ $driver->id }}'>{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Kendaraan</label>
                        @error ('id_vehicle')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <select wire:model.live='id_vehicle' class='input-select @error('id_vehicle') input-state-error @enderror input-state-normal'>
                        <option value=''></option>
                        @foreach ($this->availableVehicles as $vehicle)
                            <option value='{{ $vehicle->id }}'>{{ $vehicle->plate }} - {{ $vehicle->vehicle_type->name }} - {{ $vehicle->brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='input-container'>
                    <div class='flex justify-between items-center'>
                        <label class='font-semibold'>Tgl. Tugas</label>
                        @error ('datetime_assigned')
                            <div class='group/error relative flex items-center gap-2'>
                                <p class='error-message'>{{ $message }}</p>
                                <i class='bi-info-circle text-red-500'></i>
                            </div>
                        @enderror
                    </div>
                    <input wire:model.live='datetime_assigned' type='datetime-local' class='input-general @error('datetime_assigned') input-state-error @enderror input-state-normal'>
                </div>
            </div>
        </div>

        <div class='py-5 px-10 sticky bottom-0 bg-white border-t flex justify-end items-center gap-2'>
            <button type='button' wire:click='resetForm' class='btn-ghost-stone'><i class='bi-backspace'></i>Reset</button>
            <button type='submit' @if(!$errors->any()) x-on:click='showModal=false' @endif class='btn-stone'><i class='bi-check-square'></i>Tugaskan</button>
        </div>

    </form>

</div>