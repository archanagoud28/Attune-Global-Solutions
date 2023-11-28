<?php

namespace App\Livewire;

use App\Models\CompanyDetails;
use App\Models\CustomerDetails;
use App\Models\SalesOrder;
use App\Models\VendorDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class Vendors extends Component
{
    use WithFileUploads;
    public $customerId;
    public $rate;
    public $rateType;
    public $endClientTimesheetRequired;
    public $timeSheetType;
    public $timeSheetBegins;
    public $invoiceType;
    public $paymentType;
    public $selected_vendor;
    public $company_name;
    public $show = false;

    public  $vendor_profile, $company_id, $vendor_name, $email, $phone, $address, $notes, $vendor_company_name;

    public $selectedVendor;
    public $vendor_id;
    public $soList = false;
    public $showSOLists;
    public function showSoList($vendorId)
    {
        $this->showSOLists = SalesOrder::with('customer')->where('vendor_id', $vendorId)->get();
        $this->soList = true;
    }
    public function closeSOList()
    {
        $this->soList = false;
    }

    public $employeeSkillsPairs = [['employees' => '', 'skills' => '']];

    public function addPair()
    {
        $this->employeeSkillsPairs[] = ['employees' => '', 'skills' => ''];
    }

    public $activeButton = 'Bills';

    public function removePair($index)
    {
        unset($this->employeeSkillsPairs[$index]);
        $this->employeeSkillsPairs = array_values($this->employeeSkillsPairs);
    }
    public function savePurchaseOrder()
    {
        $this->validate([
            'employeeSkillsPairs.*.employees' => 'required',
            'employeeSkillsPairs.*.skills' => 'required',
            'customerId' => 'required',
            'rate' => 'required',
            'rateType' => 'required',
            'endClientTimesheetRequired' => 'required_if:endClientTimesheetRequired,true',
            'timeSheetType' => 'required',
            'timeSheetBegins' => 'required',
            'invoiceType' => 'required',
            'paymentType' => 'required',
        ]);

        SalesOrder::create([
            'customer_id' => $this->customerId,
            'vendor_id' => $this->vendor_id,
            'rate' => $this->rate . ' ' . $this->rateType,
            'end_client_timesheet_required' => $this->endClientTimesheetRequired,
            'employees_and_skills' => $this->employeeSkillsPairs,
            'time_sheet_type' => $this->timeSheetType,
            'time_sheet_begins' => $this->timeSheetBegins,
            'invoice_type' => $this->invoiceType,
            'payment_type' => $this->paymentType,
        ]);
        session()->flash('sales-order', 'Sales order submitted successfully.');
        $this->po = false;
    }
    public function selectVendor($vendorId)
    {
        $this->selectedVendor = VendorDetails::where('vendor_id', $vendorId)->first();
    }

    public $filteredPeoples;
    public $peopleFound;

    public $searchTerm;
    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $this->filteredPeoples = VendorDetails::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('vendor_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('vendor_id', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('contact_person', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('status', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->get();

        // Check if any records were found
        $this->peopleFound = count($this->filteredPeoples) > 0;
    }


    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
    public function addVendors()
    {
        $this->validate([
            'vendor_profile' => 'required',
            'vendor_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'vendor_company_name' => 'required'
        ]);
        $vendorProfilePath = $this->vendor_profile->store('vendor_profiles', 'public');
        $companyId = auth()->user()->company_id;

        VendorDetails::create([
            'vendor_image' => $vendorProfilePath,
            'company_id' => $companyId,
            'contact_person' => $this->vendor_name,
            'vendor_name' => $this->vendor_company_name,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'address' => $this->address,
        ]);
        session()->flash('vendor', 'Vendor added successfully.');
        $this->show = false;
    }
    public $edit = false;

    public $selectedVendorId;
    public function editVendors($vendorId)
    {
        $this->selectedVendorId = $vendorId;

        $this->edit = true;
        $this->selected_vendor = VendorDetails::find($vendorId);
        $this->vendor_profile = $this->selected_vendor->vendor_image;
        $this->company_id = $this->selected_vendor->company_id;
        $this->vendor_name = $this->selected_vendor->contact_person;
        $this->vendor_company_name = $this->selected_vendor->vendor_name;
        $this->email = $this->selected_vendor->email;
        $this->phone = $this->selected_vendor->phone_number;
        $this->address = $this->selected_vendor->address;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }

    public function updateVendors()
    {
        $this->validate([
            'vendor_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'vendor_company_name' => 'required'
        ]);
        $vendor = VendorDetails::find($this->selectedVendorId);

        if ($this->vendor_profile instanceof \Illuminate\Http\UploadedFile) {
            $vendorProfilePath = $this->vendor_profile->store('vendor_profiles', 'public');
            $vendor->update(['vendor_image' => $vendorProfilePath]);
        }

        $companyId = auth()->user()->company_id;

        $vendor->update([
            'company_id' => $companyId,
            'contact_person' => $this->vendor_name,
            'vendor_name' => $this->vendor_company_name,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'address' => $this->address,
        ]);

        // Reset the Livewire properties and set edit mode to false
        $this->reset();
        $this->edit = false;
    }


    public $allVendors;
    public $companies;
    public $po = false;
    public function addPO()
    {
        $this->po = true;
    
    }
    public function cancelPO()
    {
        $this->po = false;
    }
    public $vendors;
    public $customers;
    public function render()
    {
        $companyId = auth()->user()->company_id;

        $this->customers = CustomerDetails::where('company_id',$companyId)->orderBy('created_at', 'desc')->get();
        $this->vendors = VendorDetails::with('company') ->where('company_id',$companyId)->orderBy('created_at', 'desc')->get();
        $this->allVendors = $this->filteredPeoples ?: $this->vendors;
        return view('livewire.vendors');
    }
}
