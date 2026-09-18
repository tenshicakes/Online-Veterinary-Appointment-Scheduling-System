<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Appointment extends Component
{
    public function render()
    {
        return view('livewire.customer.appointment');
    }
}
