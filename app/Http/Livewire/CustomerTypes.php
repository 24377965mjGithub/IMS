<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CustomerType;

class CustomerTypes extends Component
{

    public $customerType = '';

    // edit
    public $editCustomerType = '';

    public function saveCustomerType() {

        $this->validate([
            'customerType' => 'required'
        ]);

        if (CustomerType::create([
            'customersType' => $this->customerType
        ])) {
            session()->flash('message', $this->customerType.' added successfully.');
        }
    }

    // bind editable data
    public function editData($customerType) {
        $this->editCustomerType = $customerType;
    }

    // save edit customer type data
    public function saveEdit($id) {
        $this->validate([
            'editCustomerType' => 'required'
        ]);

        if (CustomerType::where(['id' => $id])->update([
            'customersType' => $this->editCustomerType
        ])) {
            session()->flash('message', $this->editCustomerType.' updated successfully.');
        }
    }

    public function delete($id) {
        CustomerType::where(['id' => $id])->delete();
        session()->flash('message2', "Customer type deleted successfully.");
    }

    public function hydrate() : void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $customerTypes = CustomerType::paginate(10);
        return view('livewire.customer-types', [
            'customerTypes' => $customerTypes
        ]);
    }
}
