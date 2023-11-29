<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\CustomerDetails;
use App\Models\Invoice;
use App\Models\VendorDetails;
use Livewire\Component;

class BillsOrInvoices extends Component
{
    public $bills, $invoices;
    public $activeButton = "Bills";

    public $bill_number;
    public $vendor_name;
    public $customer_name;
    public $amount;
    public $due_date;
    public $payment_terms;
    public $description;
    public $status;
    public $currency;
    public $notes;
    public $company_id;

    public $bill = false;
    public function show()
    {
        $this->bill = true;
    }

    public function showInvoice()
    {
        $this->invoice=true;
    }
    public function addBill()
    {
        $this->validate([
            'vendor_name' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'payment_terms' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'currency' => 'required',
            'notes' => 'nullable',
        ]);

        $companyId = auth()->user()->company_id;

        // Create a new bill
        Bill::create([
            'bill_number' => $this->bill_number,
            'vendor_id' => $this->vendor_name,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'payment_terms' => $this->payment_terms,
            'description' => $this->description,
            'status' => $this->status,
            'currency' => $this->currency,
            'notes' => $this->notes,
            'company_id' => $companyId,
        ]);
        $this->bill=false;

        session()->flash('add-bill', 'Bill added successfully.');
    }

    public function addInvoice()
    {

        $this->validate([
            'customer_name' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'payment_terms' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'currency' => 'required',
            'notes' => 'nullable',
        ]);
        $companyId = auth()->user()->company_id;

        Invoice::create([
            'customer_id' => $this->customer_name,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'payment_terms' => $this->payment_terms,
            'description' => $this->description,
            'status' => $this->status,
            'currency' => $this->currency,
            'notes' => $this->notes,
            'company_id' => $companyId,
        ]);
        $this->invoice=false;
        session()->flash('add-invoice', 'Invoice added successfully.');
    }
    public function close()
    {
        $this->bill = false;
    }
    public $invoice = false;
    public function closeInvoice()
    {
        $this->invoice = false;
    }
    public $vendors, $customers;
    public function render()
    {
        $companyId = auth()->user()->company_id;
        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->bills = Bill::with('vendor', 'company')->where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->invoices = Invoice::with('customer', 'company')->where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        return view('livewire.bills-or-invoices');
    }
}
