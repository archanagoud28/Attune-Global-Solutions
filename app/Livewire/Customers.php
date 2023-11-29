<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\CompanyDetails;
use App\Models\CustomerDetails;
use App\Models\EmpDetails;
use App\Models\Invoice;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
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
    public $customerId;
    public $soList = false;
    public $showSOLists;

    public function updateAndShowSoList($customerId)
    {
        $this->activeButton = 'SO';
        $this->showSoList($customerId);
    }
    public $invoices;
    public function showInvoices($customerId){
        $companyId = auth()->user()->company_id;

        $this->activeButton = 'Invoices';
        $this->invoices = Invoice::with('customer','company')->where('company_id',$companyId)->where('customer_id',$customerId)->orderBy('created_at','desc')->get();
    }
    public function showSoList($customerId)
    {
        $companyId = auth()->user()->company_id;

        $this->showSOLists = SalesOrder::with('cus','com','emp')->where('company_id',$companyId)->where('customer_id', $customerId)->orderBy('created_at','desc')->get();
        $this->soList = true;
    }
    public function closeSOList()
    {
        $this->soList = false;
    }
    public $job_title, $startDate, $endDate, $consultant_name, $customerName, $paymentTerms;
    public function saveSalesOrder()
    {
        $this->validate([
            'rate' => 'required',
            'rateType' => 'required',
            'job_title' => 'required',
            'endClientTimesheetRequired' => 'required',
            'timeSheetType' => 'required',
            'timeSheetBegins' => 'required',
            'invoiceType' => 'required',
            'paymentTerms' => 'required',
            'consultant_name' => 'required',
            'customerName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $companyId = auth()->user()->company_id;

        SalesOrder::create([
            'company_id' => $companyId,
            'emp_id' => $this->consultant_name,
            'customer_id' => $this->customerName,
            'job_title' => $this->job_title,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'rate' => $this->rate . ' ' . $this->rateType,
            'end_client_timesheet_required' => $this->endClientTimesheetRequired,
            'time_sheet_type' => $this->timeSheetType,
            'time_sheet_begins' => $this->timeSheetBegins,
            'invoice_type' => $this->invoiceType,
            'payment_terms' => $this->paymentTerms,
        ]);
        session()->flash('sales-order', 'Sales order submitted successfully.');
        $this->so = false;
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
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
        $companyId = auth()->user()->company_id;

        CustomerDetails::create([
            'customer_company_logo' => $customerProfilePath,
            'company_id' => $companyId,
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
    public $activeButton = '';

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
        $companyId = auth()->user()->company_id;


        $customer->update([
            'company_id' => $companyId,
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
    public $so = false;
    public function addSO()
    {

        $this->so = true;
    }
    public function cancelSO()
    {
        $this->so = false;
    }
    public $vendors, $employees;
    public function selectedConsultantId()
    {
        $selectedConsultantId = $this->employees->firstWhere('emp_id', $this->consultant_name);
        $this->job_title = $selectedConsultantId ? $selectedConsultantId->job_title : null;
    }
    public function render()
    {
        $companyId = auth()->user()->company_id;

        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->employees = EmpDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->allCustomers = $this->filteredPeoples ?: $this->customers;
        return view('livewire.customers');
    }
}
