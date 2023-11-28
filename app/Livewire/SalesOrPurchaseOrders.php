<?php

namespace App\Livewire;

use App\Models\CustomerDetails;
use App\Models\VendorDetails;
use Livewire\Component;

class SalesOrPurchaseOrders extends Component
{
    public $po = false;
    public $selectedVendor,$vendor_id,$customers;
    public $show=false; 
 
    public function addPO()
    {
        $this->po = true;
        // $this->selectedVendor = VendorDetails::where('vendor_id', $vendorId)->first();
        // $this->vendor_id = $this->selectedVendor->vendor_id;
    }
    public function cancelPO()
    {
        $this->po = false;
    }
    public function render()
    {
        $this->customers = CustomerDetails::all();

        return view('livewire.sales-or-purchase-orders');
    }
}
