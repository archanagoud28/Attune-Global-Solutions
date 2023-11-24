<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VendorDetails;
class VendorPage extends Component
{
    public $search = '';
    public $view = 'grid';
    public $show = false;

    public $viewMode;
    public function toggleView()
    {
        $this->viewMode = ($this->viewMode === 'table') ? 'grid' : 'table';
    }


    public function addVendor()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
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
