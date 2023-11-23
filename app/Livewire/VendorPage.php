<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VendorDetails;
class VendorPage extends Component
{
    public $search = '';
    public $view = 'grid';

    public function render()
    {
        $query = VendorDetails::query();

        if ($this->search !== '') {
            $query->where('vendor_name', 'like', '%' . $this->search . '%');
        }

        $vendors = $query->get();


        return view('livewire.vendor-page', ['vendors' => $vendors]);
    }


    public function switchView($view)
    {
        $this->view = $view;
    }
}
