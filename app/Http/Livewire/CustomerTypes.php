<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CustomerType;

class CustomerTypes extends Component
{

    public function render()
    {
        $customerTypes = CustomerType::paginate(5);
        return view('livewire.customer-types', [
            'customerTypes' => $customerTypes
        ]);
    }
}
