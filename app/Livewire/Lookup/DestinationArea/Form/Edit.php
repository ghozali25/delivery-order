<?php

namespace App\Livewire\Lookup\DestinationArea\Form;

use App\Models\DestinationArea;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idDestinationArea;
    #[Computed()]
    public function destinationArea()
    {
        return DestinationArea::find($this->idDestinationArea);
    }

    public $abbreviation;
    public $name;
    protected function rules()
    {
        return [
            'abbreviation' => ['nullable', 'string', 'unique:App\Models\DestinationArea,abbreviation,' . $this->idDestinationArea],
            'name' => ['required', 'string', 'unique:App\Models\DestinationArea,name,' . $this->idDestinationArea],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->destinationArea)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->destinationArea->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('destination-area-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->abbreviation = $this->destinationArea->abbreviation;
        $this->name = $this->destinationArea->name;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(DestinationArea $destinationArea)
    {
        $this->idDestinationArea = $destinationArea->id;
        $this->resetForm();
    }
}
