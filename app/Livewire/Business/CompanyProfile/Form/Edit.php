<?php

namespace App\Livewire\Business\CompanyProfile\Form;

use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Computed()]
    public function companyProfile()
    {
        return CompanyProfile::first();
    }

    public $abbreviation;
    public $name;
    public $address;
    public $email;
    public $phone;
    public $about;
    protected function rules()
    {
        return [
            'abbreviation' => ['required', 'string'],
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'about' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->companyProfile)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->companyProfile->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('company-profile-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->abbreviation = $this->companyProfile->abbreviation;
        $this->name = $this->companyProfile->name;
        $this->address = $this->companyProfile->address;
        $this->email = $this->companyProfile->email;
        $this->phone = $this->companyProfile->phone;
        $this->about = $this->companyProfile->about;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount()
    {
        $this->resetForm();
    }
}
