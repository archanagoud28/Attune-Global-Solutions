<div style="padding:20px">
    <!-- Add this to your HTML file -->
    <style>
        .customer-image {
            border-radius: 2;
            height: 100px;
            width: 300px;
            margin-top: 25px;
            background-color: white;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            margin: 0 auto;
            max-width: 100%;
            margin-top: 30px;
        }

        .profile-image,
        .people-image,
        .customer-profile {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 5%;
            border: 1px solid darkgrey;

        }

        .username {
            font-size: 12px;
            color: white;
        }

        .modal {
            display: block;
            overflow-y: auto;
        }

        .modal-dialog {
            margin: 1.75rem auto;
        }

        .modal-header {
            background-color: rgb(2, 17, 79);
            height: 50px;
        }

        .modal-title {
            padding: 5px;
            color: white;
            font-size: 12px;
        }

        .modal-body {
            padding: 1rem;
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

        .row {
            margin-right: 0;
            margin-left: 0;
        }

        .customer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            font-size: 12px;
        }

        .customer-card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .customer-details {
            margin-top: 15px;
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

        .button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            padding: 3px;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }

        .alert {
            height: 40px;
            width: 100%;
            text-align: center;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>

    <p style="text-align: start;margin-top:15px">
        <button style="margin-right: 10px;" wire:click="open" class="button">ADD Customers</button>
        <button style="margin-right: 10px;" wire:click="addSO" class="button">ADD SO</button>

    </p>
    @if(session()->has('success'))
    <div id="successAlert" style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session()->has('sales-order'))
    <div id="purchaseOrderAlert" style="text-align: center;" class="alert alert-success">
        {{ session('sales-order') }}
    </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
            document.getElementById('purchaseOrderAlert').style.display = 'none';
        }, 5000);
    </script>
    <div class="row" style="height:150px">
        @php
        $selectedPerson = $selectedCustomer ?? $customers->first();
        $isActive = $selectedPerson->status == 'active';
        @endphp
        <div class="col-md-3" style="background-color: #f2f2f2;margin-right:5px">
            <img style="height: 160px" src="data:image/jpeg;base64,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" alt="">
        </div>
        <div class="col-md-8" style="background-color: #f2f2f2; padding: 8px">
            <p style="text-align: start">
                <button style="margin-right: 10px;" wire:click="editCustomers('{{$selectedPerson->id}}')" class="button">Edit</button>
            </p>
            @if ($selectedCustomer)

            <div class="row" style="font-size: 13px;">
                <div class="row">
                    @php
                    $selectedPerson = $selectedCustomer ?? $customers->first();
                    $isActive = $selectedPerson->status == 'active';
                    @endphp
                    <div class="col">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1;">

                                <h2 style="font-size: 10px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->customer_company_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($selectedPerson)->customer_id }})</p>


                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->address }}</p>

                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->email }}</p>
                            </div>
                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->customer_name }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->phone }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @elseif (!$customers->isEmpty())
            @if($poList=="true")
            <div style="text-align: end;">
                <button wire:click="closePOList" style="background-color: rgb(2, 17, 79);color:white;border-radius:5px;border:none">Back</button>
            </div>
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
                        font-size: 12px;
                        /* Set font size to 12px */
                    }

                    th {
                        background-color: #f2f2f2;
                        font-size: 12px;

                    }

                    tr:hover {
                        background-color: #f5f5f5;
                        font-size: 12px;

                    }
                </style>

                <table class="table">
                    <thead>
                        <tr>
                            <th>PO Number</th>
                            <th>Customer ID</th>
                            <th>Vendor ID</th>
                            <th>Vendor Name</th>
                            <th>Rate</th>
                            <th>Time Sheet Type</th>
                            <th>Time Sheet Begins</th>
                            <th>Invoice Type</th>
                            <th>Payment Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($showPOLists as $purchaseOrder)
                        <tr>
                            <td>{{ $purchaseOrder->po_number }}</td>
                            <td>{{ $purchaseOrder->customer_id }}</td>
                            <td>{{ $purchaseOrder->vendor_id }}</td>
                            <td>{{ $purchaseOrder->vendor->vendor_name }}</td>
                            <td>{{ $purchaseOrder->rate }}</td>
                            <td>{{ $purchaseOrder->time_sheet_type }}</td>
                            <td>{{ $purchaseOrder->time_sheet_begins }}</td>
                            <td>{{ $purchaseOrder->invoice_type }}</td>
                            <td>{{ $purchaseOrder->payment_type }}</td>
                        </tr>
                        @empty
                        <div style="text-align: center; margin-top: 10px;">Purchase Orders Not Found</div>
                        @endforelse

                    </tbody>
                </table>
            </div>

            @else
            <!-- Display details of the first person in the list -->
            @php
            $firstPerson = $customers->first();
            $starredPerson = DB::table('customer_details')
            ->where('customer_id', $firstPerson->customer_id)
            ->first();
            @endphp

            <div class="row" style="font-size: 13px;">
                <div class="row">
                    <div class="col">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1;">
                                <h2 style="font-size: 10px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->customer_company_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($firstPerson)->customer_id }})</p>

                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->address }}</p>

                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->email }}</p>

                            </div>
                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->customer_name }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->phone }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            @endif

        </div>
    </div>



    @if($show=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Customers Details</b></h5>
                    <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addCustomers">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Customer Company Logo:</label>
                            <input type="file" wire:model="customer_profile">
                            @error('customer_profile') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Customer Name:</label>
                            <input type="text" wire:model="customer_name">
                            @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Customer Company Name:</label>
                            <input type="text" wire:model="customer_company_name">
                            @error('customer_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" style="font-size: 12px;">Email:</label>
                            <input type="email" wire:model="email">
                            @error('email') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone" style="font-size: 12px;">Phone:</label>
                            <input type="text" wire:model="phone">
                            @error('phone') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="address" style="font-size: 12px;">Address:</label>
                            <textarea wire:model="address"></textarea>
                            @error('address') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes" style="font-size: 12px;">Notes:</label>
                            <textarea wire:model="notes"></textarea>
                            @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" wire:click="close" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif

    @if($edit=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Edit Customers Details</b></h5>
                    <button wire:click="closeEdit" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateCustomers">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Customer Company Logo:</label>
                            <input type="file" wire:model="customer_profile">
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Customer Name:</label>
                            <input type="text" wire:model="customer_name">
                            @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Customer Company Name:</label>
                            <input type="text" wire:model="customer_company_name">
                            @error('customer_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" style="font-size: 12px;">Email:</label>
                            <input type="email" wire:model="email">
                            @error('email') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone" style="font-size: 12px;">Phone:</label>
                            <input type="text" wire:model="phone">
                            @error('phone') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="address" style="font-size: 12px;">Address:</label>
                            <textarea wire:model="address"></textarea>
                            @error('address') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes" style="font-size: 12px;">Notes:</label>
                            <textarea wire:model="notes"></textarea>
                            @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success" type="submit">Update</button>
                            <button class="btn btn-danger" wire:click="closeEdit" type="button" style="font-size: 12px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif



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
                                <select wire:change="selectedConsultantId" style="font-size: 12px;" class="form-control" id="vendorName" wire:model="consultant_name">
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
                                    <input style="font-size: 12px;" type="number" class="form-control" id="rate" wire:model="job_title" readonly> 
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
                                <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="rate" placeholder="Ex: Net 0,Net 10,........">

                                @error('paymentType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

    <!-- Everyone tab content -->
    @if($poList=="true")
    <div style="text-align: end;">
        <button wire:click="closePOList" style="background-color: rgb(2, 17, 79);color:white;border-radius:5px;border:none">Back</button>
    </div>
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
                font-size: 12px;
                /* Set font size to 12px */
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }
        </style>

        <table class="table">
            <thead>
                <tr>
                    <th>PO Number</th>
                    <th>Customer ID</th>
                    <th>Vendor ID</th>
                    <th>Vendor Name</th>
                    <th>Rate</th>
                    <th>Time Sheet Type</th>
                    <th>Time Sheet Begins</th>
                    <th>Invoice Type</th>
                    <th>Payment Type</th>
                </tr>
            </thead>
            <tbody>
                @forelse($showPOLists as $purchaseOrder)
                <tr>
                    <td>{{ $purchaseOrder->po_number }}</td>
                    <td>{{ $purchaseOrder->customer_id }}</td>
                    <td>{{ $purchaseOrder->vendor_id }}</td>
                    <td>{{ $purchaseOrder->vendor->vendor_name }}</td>
                    <td>{{ $purchaseOrder->rate }}</td>
                    <td>{{ $purchaseOrder->time_sheet_type }}</td>
                    <td>{{ $purchaseOrder->time_sheet_begins }}</td>
                    <td>{{ $purchaseOrder->invoice_type }}</td>
                    <td>{{ $purchaseOrder->payment_type }}</td>
                </tr>
                @empty
                <div style="text-align: center; margin-top: 10px;">Purchase Orders Not Found</div>
                @endforelse

            </tbody>
        </table>
    </div>

    @else
    <div class="row" style="margin-top: 15px;height:400px">
        <div class="col-md-3" style="background-color:#f2f2f2;height: auto; padding: 5px;margin-right:5px;max-height:500px;overflow-y:auto">
            <div class="container" style="margin-top: 8px;margin-bottom:8px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 10px; cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for customers" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 30px; border-radius: 0 5px 5px 0; background-color: #007BFF; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="font-size: 13px;">
                @if ($allCustomers->isEmpty())
                <div class="container" style="text-align: center; color: gray;">No Customers Found</div>
                @else
                @foreach($allCustomers as $customer)
                <div wire:click="selectCustomer('{{ $customer->customer_id }}')" class="container-11" style="margin-bottom:2px;height:25px;cursor: pointer; background-color: {{ $selectedCustomer && $selectedCustomer->customer_id == $customer->customer_id ? '#ccc' : 'white' }}; width: 500px; border-radius: 5px;padding:5px;">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6 class="username" style="font-size: 10px; color: black;">{{ $customer->customer_company_name }}</h6>
                        </div>
                        <div class="col-md-3">
                            <h6 class="username" style="font-size: 8px; color: black;">{{ $customer->phone }}</h6>
                        </div>
                        <div class="col-md-4">
                            <h6 class="username" style="font-size: 8px; color: black;">#({{ $customer->customer_id }})</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="username" style="font-size: 12px; color: black;">#({{ $customer->customer_id }})</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
        <div class="col-md-8" style="height:auto; background-color: #f2f2f2; padding: 8px">
            <div style="text-align: start;">
                <button wire:click="$set('activeButton', 'Invoices')" style="{{ $activeButton === 'Invoices' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 10px; border-radius: 5px; border: none;">
                    Invoices & Payments
                </button>

                <button wire:click="$set('activeButton', 'SO')" style="{{ $activeButton === 'SO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 10px; border-radius: 5px; border: none;">
                    SO
                </button>

                <button wire:click="$set('activeButton', 'EmailActivities')" style="{{ $activeButton === 'EmailActivities' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 10px; border-radius: 5px; border: none;">
                    Email Activities
                </button>
                <button wire:click="$set('activeButton', 'Notes')" style="{{ $activeButton === 'Notes' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 10px; border-radius: 5px; border: none;">
                    Notes
                </button>
                <button wire:click="$set('activeButton', 'Contacts')" style="{{ $activeButton === 'Contacts' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 10px; border-radius: 5px; border: none;">
                    Contacts
                </button>

            </div>

        </div>
    </div>
    @endif
    <!-- End of Everyone tab content -->
</div>