<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Services extends Component
{
    public function render()
    {
        return view('livewire.customer.services');
    }
}
