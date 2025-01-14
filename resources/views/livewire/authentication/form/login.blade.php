<div class='h-[100%] w-[100%] flex justify-center items-center'>
    
    <form wire:submit='submitForm'  class='min-w-[350px] p-10 shadow-md rounded-md bg-white flex flex-col gap-10'>
        <p class='font-semibold text-3xl'>Login</p>
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
                <label class='font-semibold'>Password</label>
                @error ('password')
                    <div class='group/error relative flex items-center gap-2'>
                        <p class='error-message'>{{ $message }}</p>
                        <i class='bi-info-circle text-red-500'></i>
                    </div>
                @enderror
            </div>
            <input wire:model.live='password' type='password' spellcheck='false' class='input-general @error('password') input-state-error @enderror input-state-normal'>
        </div>
        <div class='flex justify-end items-center gap-2'>
            <a href='{{ route('home') }}' wire:navigate class='btn-ghost-stone'><i class='bi-chevron-left'></i>Kembali</a>
            <button type='submit' class='btn-stone'><i class='bi-box-arrow-in-right'></i>Log In</button>
        </div>
    </form>

</div>
