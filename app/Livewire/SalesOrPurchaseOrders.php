<?php

namespace App\Livewire;

use App\Models\CustomerDetails;
use App\Models\EmpDetails;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\VendorDetails;
use Livewire\Component;

class SalesOrPurchaseOrders extends Component
{
    public $po, $so = false;
    public $selectedVendor, $vendor_id, $customers;
    public $show = false;

    public function addPO()
    {
        $this->po = true;
        // $this->selectedVendor = VendorDetails::where('vendor_id', $vendorId)->first();
        // $this->vendor_id = $this->selectedVendor->vendor_id;
    }
    public $activeButton = "SO";

    public function cancelPO()
    {
        $this->po = false;
    }
    public $showSOLists, $showPOLists;

    public $employees,$vendors, $consultantName, $customerName, $consultant_name, $vendorName, $job_title, $startDate, $endDate, $rate, $rateType, $endClientTimesheetRequired, $timeSheetType, $timeSheetBegins, $invoiceType, $paymentTerms;

    public function savePurchaseOrder()
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
            'consultantName' => 'required',
            'vendorName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $companyId = auth()->user()->company_id;

        PurchaseOrder::create([
            'company_id' => $companyId,
            'emp_id' => $this->consultantName,
            'vendor_id' => $this->vendorName,
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
        session()->flash('purchase-order', 'Purchase order submitted successfully.');
        $this->po = false;
    }

    public function addSO()
    {

        $this->so = true;
    }
    public function cancelSO()
    {
        $this->so = false;
    }
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
            'consultantName' => 'required',
            'customerName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $companyId = auth()->user()->company_id;

       SalesOrder::create([
            'company_id' => $companyId,
            'emp_id' => $this->consultantName,
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


    
    public function selectedConsultantId()
    {
        $selectedConsultantId = $this->employees->firstWhere('emp_id', $this->consultantName);
        $this->job_title = $selectedConsultantId ? $selectedConsultantId->job_title : null;
    }
    public function render()
    {
        $companyId = auth()->user()->company_id;
        $this->employees = EmpDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->showSOLists = SalesOrder::with('cus', 'com', 'emp')->where('company_id', $companyId)->orderBy('created_at','desc')->get();
        $this->showPOLists = PurchaseOrder::with('ven', 'com', 'emp')->where('company_id', $companyId)->orderBy('created_at','desc')->get();
        $this->customers = CustomerDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        $this->vendors = VendorDetails::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();

        return view('livewire.sales-or-purchase-orders');
    }
}
