<div style="padding:20px">
    <html>
    <style>
        .error {
            font-size: 12px;
            color: red;
        }

        .table {
            width: 100%;
            font-size: 12px;
            font-family: 'Roboto', sans-serif;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            text-align: center;
            width: 20%;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: rgb(2, 17, 79);
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #343a40;
        }

        form {
            font-size: 12px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 12px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 12px;
        }

        .button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            padding: 3px;
            font-size: 12px;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>

    </html>

    <body>
        <p style="text-align: start;">
            <button style="margin-right: 10px;" wire:click="addSO" class="button">ADD SO</button>
            <button style="margin-right: 10px;" wire:click="addPO" class="button">ADD PO</button>
        </p>
        @if(session()->has('purchase-order'))
        <div id="purchaseOrderAlert" style="text-align: center;" class="alert alert-success">
            {{ session('purchase-order') }}
        </div>
        @elseif(session()->has('sales-order'))
        <div id="salesOrderAlert" style="text-align: center;" class="alert alert-success">
            {{ session('sales-order') }}
        </div>
        @endif
        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
                document.getElementById('purchaseOrderAlert').style.display = 'none';
                document.getElementById('salesOrderAlert').style.display = 'none';
            }, 5000);
        </script>

        <p style="text-align: center;">
            <button wire:click="$set('activeButton', 'SO')" style="{{ $activeButton === 'SO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 10px; border-radius: 5px; border: none;">
                View SO's
            </button>
            <button wire:click="$set('activeButton', 'PO')" style="{{ $activeButton === 'PO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 10px; border-radius: 5px; border: none;">
                View PO's
            </button>

        </p>

        @if($so=="true")
        <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Sales Order</b></h5>
                        <button wire:click="cancelSO" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                            <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <style>
                                .form-group {
                                    margin-bottom: 10px;
                                }
                            </style>
                            <form wire:submit.prevent="saveSalesOrder">
                                @csrf

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Consultant Name:</label>
                                    <select wire:change="selectedConsultantId" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="consultantName">
                                        <option style="font-size: 12px;" value="">Select Consultant</option>
                                        @foreach($employees as $employee)
                                        <option style="font-size: 12px;" value="{{ $employee->emp_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('consultantName') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="rate">Job Title:</label>
                                    <div class="input-group">
                                        <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="job_title" readonly>
                                    </div> <br>
                                    @error('job_title') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                </div>


                                <div class="row mb-2">
                                    <div class="col">
                                        <label style="font-size: 12px;" for="start_date">Start Date:</label>
                                        <input style="font-size: 12px;" type="date" wire:model="startDate" class="form-control">
                                    </div> <br>
                                    @error('startDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                    <div class="col">
                                        <label style="font-size: 12px;" for="end_date">End Date:</label>
                                        <input style="font-size: 12px;" type="date" wire:model="endDate" class="form-control">

                                    </div> <br>
                                    @error('endDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                </div>


                                <div class="form-group">
                                    <label style="font-size: 12px;" for="rate">Rate:</label>
                                    <div class="input-group">
                                        <input style="font-size: 12px;" type="number" class="form-control" id="rate" wire:model="rate">
                                        @error('rate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                        <select style="font-size: 12px;" class="form-control" id="rateType" wire:model="rateType">
                                            <option style="font-size: 12px;">Select Rate Type</option>
                                            <option style="font-size: 12px;" value="Hourly">Per Hour</option>
                                            <option style="font-size: 12px;" value="Daily">Per Day</option>
                                            <option style="font-size: 12px;" value="Weekly">Per Week</option>
                                            <option style="font-size: 12px;" value="Monthly">Per Month</option>
                                        </select>
                                        @error('rateType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Customer Name:</label>
                                    <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="customerName">
                                        <option style="font-size: 12px;" value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                        <option style="font-size: 12px;" value="{{ $customer->customer_id }}">{{ $customer->customer_company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customerName') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="endClientTimesheetRequired">End Client Time sheet required:</label>
                                    <select style="font-size: 12px;" class="form-control" id="endClientTimesheetRequired" wire:model="endClientTimesheetRequired">
                                        <option style="font-size: 12px;">Select required or not</option>
                                        <option style="font-size: 12px;" value="Required">Required</option>
                                        <option style="font-size: 12px;" value="Not required">Not Required</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('endClientTimesheetRequired') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label style="font-size: 12px;" for="timeSheetType">Time Sheet Type:</label>
                                            <select style="font-size: 12px;" class="form-control" id="timeSheetType" wire:model="timeSheetType">
                                                <option style="font-size: 12px;">Select Time Sheet Type</option>
                                                <option style="font-size: 12px;" value="Weekly">Weekly</option>
                                                <option style="font-size: 12px;" value="Semi-Monthly">Semi Monthly</option>
                                                <option style="font-size: 12px;" value="Monthly">Monthly</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            @error('timeSheetType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label style="font-size: 12px;" for="timeSheetBegins">Time Sheet Begins:</label>
                                            <select style="font-size: 12px;" class="form-control" id="timeSheetBegins" wire:model="timeSheetBegins">
                                                <option style="font-size: 12px;">Select Time Sheet Begins</option>
                                                <option style="font-size: 12px;" value="Mon-Sun">Monday to Sunday</option>
                                                <option style="font-size: 12px;" value="Sun-Sat">Sunday to Saturday</option>
                                                <option style="font-size: 12px;" value="Sat-Fri">Saturday to Friday</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            @error('timeSheetBegins') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="invoiceType">Invoice Type:</label>
                                    <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="invoiceType">
                                        <option style="font-size: 12px;">Select Invoice Type</option>
                                        <option style="font-size: 12px;" value="Hourly">Hourly</option>
                                        <option style="font-size: 12px;" value="Daily">Daily</option>
                                        <option style="font-size: 12px;" value="Weekly">Weekly</option>
                                        <option style="font-size: 12px;" value="Monthly">Monthly</option>
                                        <option style="font-size: 12px;" value="Project">Project-Based</option>
                                        <option style="font-size: 12px;" value="Custom">Custom</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('invoiceType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>


                                <div class="form-group">
                                    <label style="font-size: 12px;" for="paymentType">Payment Terms:</label>
                                    <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="paymentTerms" placeholder="Ex: Net 0,Net 10,........">

                                    @error('paymentTerms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                                <div style="text-align: center;">
                                    <button style="margin-top: 15px;font-size:12px" type="submit" class="btn btn-success">Submit Sales Order</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show blurred-backdrop"></div>
        @endif
        @if($activeButton=="PO")

        <!-- resources/views/livewire/purchase-order-table.blade.php -->

        <div>
            <style>
                /* Add your custom CSS styles here */
                .table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th,
                td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                    font-size: 8px;
                    /* Set font size to 12px */
                }

                th {
                    background-color: #f2f2f2;
                    font-size: 8px;

                }

                tr:hover {
                    background-color: #f5f5f5;
                    font-size: 8px;

                }
            </style>

            <table class="table">
                <thead>
                    <tr>
                        <th>PO Number</th>
                        <th>Vendor ID</th>
                        <th>Vendor Name</th>
                        <th>Employee Name</th>
                        <th>Employee Type</th>
                        <th>Job Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Time Sheet Type</th>
                        <th>Time Sheet Begins</th>
                        <th>Invoice Type</th>
                        <th>Payment Terms</th>
                        <th>PO By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($showPOLists as $salesOrder)
                    <tr>
                        <td>{{ $salesOrder->po_number }}</td>
                        <td>{{ $salesOrder->vendor_id }}</td>
                        <td>{{ $salesOrder->ven->vendor_name }}</td>
                        <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                        <td>{{ $salesOrder->emp->employee_type }}</td>
                        <td>{{ $salesOrder->emp->job_title }}</td>
                        <td>{{ $salesOrder->start_date }}</td>
                        <td>{{ $salesOrder->end_date }}</td>
                        <td>{{ $salesOrder->time_sheet_type }}</td>
                        <td>{{ $salesOrder->time_sheet_begins }}</td>
                        <td>{{ $salesOrder->invoice_type }}</td>
                        <td>{{ $salesOrder->payment_terms }}</td>
                        <td>{{ $salesOrder->com->company_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" style="text-align: center;">PurchaseOrders Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif


        @if($po=="true")
        <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Purchase Order</b></h5>
                        <button wire:click="cancelPO" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                            <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <style>
                                .form-group {
                                    margin-bottom: 10px;
                                }
                            </style>
                            <form wire:submit.prevent="savePurchaseOrder">
                                @csrf

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Consultant Name:</label>
                                    <select wire:change="selectedConsultantId" style="font-size: 12px;" class="form-control" wire:model="consultantName">
                                        <option style="font-size: 12px;" value="">Select Consultant</option>
                                        @foreach($employees as $employee)
                                        <option style="font-size: 12px;" value="{{ $employee->emp_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('consultant_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="rate">Job Title:</label>
                                    <div class="input-group">
                                        <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="job_title" readonly>
                                    </div> <br>
                                    @error('job_title') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                </div>


                                <div class="row mb-2">
                                    <div class="col">
                                        <label style="font-size: 12px;" for="start_date">Start Date:</label>
                                        <input style="font-size: 12px;" type="date" wire:model="startDate" class="form-control">
                                    </div> <br>
                                    @error('startDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                    <div class="col">
                                        <label style="font-size: 12px;" for="end_date">End Date:</label>
                                        <input style="font-size: 12px;" type="date" wire:model="endDate" class="form-control">

                                    </div> <br>
                                    @error('endDate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                </div>


                                <div class="form-group">
                                    <label style="font-size: 12px;" for="rate">Rate:</label>
                                    <div class="input-group">
                                        <input style="font-size: 12px;" type="number" class="form-control" id="rate" wire:model="rate">
                                        @error('rate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                        <select style="font-size: 12px;" class="form-control" id="rateType" wire:model="rateType">
                                            <option style="font-size: 12px;">Select Rate Type</option>
                                            <option style="font-size: 12px;" value="Hourly">Per Hour</option>
                                            <option style="font-size: 12px;" value="Daily">Per Day</option>
                                            <option style="font-size: 12px;" value="Weekly">Per Week</option>
                                            <option style="font-size: 12px;" value="Monthly">Per Month</option>
                                        </select>
                                        @error('rateType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Vendor Name:</label>
                                    <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="vendorName">
                                        <option style="font-size: 12px;" value="">Select Vendor</option>
                                        @foreach($vendors as $vendor)
                                        <option style="font-size: 12px;" value="{{ $vendor->vendor_id }}">{{ $vendor->vendor_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vendorName') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="endClientTimesheetRequired">End Client Time sheet required:</label>
                                    <select style="font-size: 12px;" class="form-control" id="endClientTimesheetRequired" wire:model="endClientTimesheetRequired">
                                        <option style="font-size: 12px;">Select required or not</option>
                                        <option style="font-size: 12px;" value="Required">Required</option>
                                        <option style="font-size: 12px;" value="Not required">Not Required</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('endClientTimesheetRequired') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label style="font-size: 12px;" for="timeSheetType">Time Sheet Type:</label>
                                            <select style="font-size: 12px;" class="form-control" id="timeSheetType" wire:model="timeSheetType">
                                                <option style="font-size: 12px;">Select Time Sheet Type</option>
                                                <option style="font-size: 12px;" value="Weekly">Weekly</option>
                                                <option style="font-size: 12px;" value="Semi-Monthly">Semi Monthly</option>
                                                <option style="font-size: 12px;" value="Monthly">Monthly</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            @error('timeSheetType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label style="font-size: 12px;" for="timeSheetBegins">Time Sheet Begins:</label>
                                            <select style="font-size: 12px;" class="form-control" id="timeSheetBegins" wire:model="timeSheetBegins">
                                                <option style="font-size: 12px;">Select Time Sheet Begins</option>
                                                <option style="font-size: 12px;" value="Mon-Sun">Monday to Sunday</option>
                                                <option style="font-size: 12px;" value="Sun-Sat">Sunday to Saturday</option>
                                                <option style="font-size: 12px;" value="Sat-Fri">Saturday to Friday</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            @error('timeSheetBegins') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="invoiceType">Invoice Type:</label>
                                    <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="invoiceType">
                                        <option style="font-size: 12px;">Select Invoice Type</option>
                                        <option style="font-size: 12px;" value="Hourly">Hourly</option>
                                        <option style="font-size: 12px;" value="Daily">Daily</option>
                                        <option style="font-size: 12px;" value="Weekly">Weekly</option>
                                        <option style="font-size: 12px;" value="Monthly">Monthly</option>
                                        <option style="font-size: 12px;" value="Project">Project-Based</option>
                                        <option style="font-size: 12px;" value="Custom">Custom</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('invoiceType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>


                                <div class="form-group">
                                    <label style="font-size: 12px;" for="paymentType">Payment Terms:</label>
                                    <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="paymentTerms" placeholder="Ex: Net 0,Net 10,........">

                                    @error('paymentTerms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                                <div style="text-align: center;">
                                    <button style="margin-top: 15px;font-size:12px" type="submit" class="btn btn-success">Submit Purchase Order</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show blurred-backdrop"></div>
        @endif






        @if($activeButton=="SO")

        <!-- resources/views/livewire/purchase-order-table.blade.php -->

        <div>
            <style>
                /* Add your custom CSS styles here */
                .table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th,
                td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                    font-size: 8px;
                    /* Set font size to 12px */
                }

                th {
                    background-color: #f2f2f2;
                    font-size: 8px;

                }

                tr:hover {
                    background-color: #f5f5f5;
                    font-size: 8px;

                }
            </style>

            <table class="table">
                <thead>
                    <tr>
                        <th>SO Number</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Employee Name</th>
                        <th>Employee Type</th>
                        <th>Job Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Time Sheet Type</th>
                        <th>Time Sheet Begins</th>
                        <th>Invoice Type</th>
                        <th>Payment Terms</th>
                        <th>SO to</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($showSOLists as $salesOrder)
                    <tr>
                        <td>{{ $salesOrder->so_number }}</td>
                        <td>{{ $salesOrder->customer_id }}</td>
                        <td>{{ $salesOrder->cus->customer_company_name }}</td>
                        <td>{{ $salesOrder->emp->first_name }} {{ $salesOrder->emp->last_name }}</td>
                        <td>{{ $salesOrder->emp->employee_type }}</td>
                        <td>{{ $salesOrder->emp->job_title }}</td>
                        <td>{{ $salesOrder->start_date }}</td>
                        <td>{{ $salesOrder->end_date }}</td>
                        <td>{{ $salesOrder->time_sheet_type }}</td>
                        <td>{{ $salesOrder->time_sheet_begins }}</td>
                        <td>{{ $salesOrder->invoice_type }}</td>
                        <td>{{ $salesOrder->payment_terms }}</td>
                        <td>{{ $salesOrder->com->company_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" style="text-align: center;">SalesOrders Not Found</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        @endif
    </body>

</div>