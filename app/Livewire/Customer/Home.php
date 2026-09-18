<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Home extends Component
{
    // Dummy data
    public $nextAppointment = [
        'pet_name' => 'Bella',
        'service' => 'General Check-up',
        'date' => '2026-09-20',
        'time' => '10:00 AM',
        'status' => 'Confirmed',
    ];

    public $appointmentHistory = [
        ['date' => '2026-09-20', 'time' => '10:00 AM', 'pet' => 'Bella', 'service' => 'General Check-up', 'price' => '₱500', 'status' => 'Pending'],
        ['date' => '2026-08-15', 'time' => '02:00 PM', 'pet' => 'Max', 'service' => 'Vaccination', 'price' => '₱850', 'status' => 'Completed'],
        ['date' => '2026-07-10', 'time' => '11:30 AM', 'pet' => 'Bella', 'service' => 'Deworming', 'price' => '₱300', 'status' => 'Canceled'],
    ];

    public function render()
    {
        return view('livewire.customer.home');
    }
}
