<?php

namespace App\Livewire;

use App\Models\CompanyDetails;
use App\Models\CustomerDetails;
use App\Models\PurchaseOrder;
use App\Models\VendorDetails;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Customers extends Component
{
    use WithFileUploads;
    public $vendorId;
    public $rate;
    public $rateType;
    public $endClientTimesheetRequired;
    public $timeSheetType;
    public $timeSheetBegins;
    public $invoiceType;
    public $paymentType;
    public $customers, $selected_customer;
    public $company_name;
    public $show = false;

    public  $customer_profile, $company_id, $customer_name, $email, $phone, $address, $notes, $customer_company_name;

    public $selectedCustomer;
    public $customer_id;
    public $poList=false;
    public $showPOLists;
    public function showPoList($customerId){
        $this->showPOLists=PurchaseOrder::where('customer_id',$customerId)->get();
        $this->poList=true;
    }
    public function closePOList(){
        $this->poList=false;
    }
    public function savePurchaseOrder()
    {
        $this->validate([
            'vendorId' => 'required',
            'rate' => 'required',
            'rateType' => 'required',
            'endClientTimesheetRequired' => 'required_if:endClientTimesheetRequired,true',
            'timeSheetType' => 'required',
            'timeSheetBegins' => 'required',
            'invoiceType' => 'required',
            'paymentType' => 'required',
        ]);

        PurchaseOrder::create([
            'customer_id' => $this->customer_id,
            'vendor_id' => $this->vendorId,
            'rate' => $this->rate . ' ' . $this->rateType,
            'end_client_timesheet_required' => $this->endClientTimesheetRequired,
            'time_sheet_type' => $this->timeSheetType,
            'time_sheet_begins' => $this->timeSheetBegins,
            'invoice_type' => $this->invoiceType,
            'payment_type' => $this->paymentType,
        ]);
        session()->flash('purchase-order', 'Purchase order submitted successfully.');
        $this->po = false;
    }
    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = CustomerDetails::where('customer_id', $customerId)->first();
    }

    public $filteredPeoples;
    public $peopleFound;

    public $searchTerm;
    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $this->filteredPeoples = CustomerDetails::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('customer_company_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('customer_id', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('customer_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
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
    public function addCustomers()
    {
        $this->validate([
            'customer_profile' => 'required',
            'company_id' => 'required',
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
        CustomerDetails::create([
            'customer_company_logo' => $customerProfilePath,
            'company_id' => $this->company_id,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);
        session()->flash('success', 'Customer added successfully.');
        $this->show = false;
    }
    public $edit = false;

    public $selectedCustomerId;
    public function editCustomers($customerId)
    {
        $this->selectedCustomerId = $customerId;

        $this->edit = true;
        $this->selected_customer = CustomerDetails::find($customerId);

        // Assign values to Livewire properties
        $this->customer_profile = $this->selected_customer->customer_company_logo;
        $this->company_id = $this->selected_customer->company_id;
        $this->customer_name = $this->selected_customer->customer_name;
        $this->customer_company_name = $this->selected_customer->customer_company_name;
        $this->email = $this->selected_customer->email;
        $this->phone = $this->selected_customer->phone;
        $this->address = $this->selected_customer->address;
        $this->notes = $this->selected_customer->notes;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }

    public function updateCustomers()
    {
        $this->validate([
            'company_id' => 'required',
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $customer = CustomerDetails::find($this->selectedCustomerId);

        if ($this->customer_profile instanceof \Illuminate\Http\UploadedFile) {
            $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
            $customer->update(['customer_company_logo' => $customerProfilePath]);
        }


        $customer->update([
            'company_id' => $this->company_id,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);

        // Reset the Livewire properties and set edit mode to false
        $this->reset();
        $this->edit = false;
    }
    public function updateStatus($customerId)
    {
        $customer = CustomerDetails::find($customerId);

        $customer->status = $customer->status == 'active' ? 'inactive' : 'active';
        $customer->save();
        return redirect('/customers');
    }

    public $allCustomers;
    public $companies;
    public $po = false;
    public function addPO($customerId)
    {
        $this->po = true;
        $this->selectedCustomer = CustomerDetails::where('customer_id', $customerId)->first();
        $this->customer_id = $this->selectedCustomer->customer_id;
    }
    public function cancelPO()
    {
        $this->po = false;
    }
    public $vendors;
    public function render()
    {
        $this->companies = CompanyDetails::all();
        $this->vendors = VendorDetails::all();
        $this->customers = CustomerDetails::with('company')->orderBy('created_at', 'desc')->get();
        $this->allCustomers = $this->filteredPeoples ?: $this->customers;
        return view('livewire.customers');
    }
}
