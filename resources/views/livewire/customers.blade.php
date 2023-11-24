<div style="padding:20px">
    <!-- Add this to your HTML file -->
    <style>
        .customer-image {
            border-radius: 2;
            height: 100px;
            width: 300px;
            border: 1px solid darkgray;
            margin-top: 25px;
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
            width: 50px;
            height: 50px;
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
            margin-bottom: 15px;
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

    <p style="margin-top: 50px;text-align:end;margin-right:25px">
        <button wire:click="open" class="button">ADD Customers</button>
    </p>


    @if(session()->has('success'))
    <div id="successAlert" style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session()->has('purchase-order'))
    <div id="purchaseOrderAlert" style="text-align: center;" class="alert alert-success">
        {{ session('purchase-order') }}
    </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
            document.getElementById('purchaseOrderAlert').style.display = 'none';
        }, 5000);
    </script>
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

                        <div style="margin-bottom:10px">
                            <label for="company_id" style="font-size: 12px;">Company ID:</label>
                            <select wire:model="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                <option value="{{ $company->company_id }}">{{ $company->company_id }}</option>
                                @endforeach
                            </select>
                            @error('company_id') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

                        <div style="margin-bottom:10px">
                            <label for="company_id" style="font-size: 12px;">Company ID:</label>
                            <select wire:model="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                <option value="{{ $company->company_id }}">{{ $company->company_id }}</option>
                                @endforeach
                            </select>
                            @error('company_id') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Vendor Name:</label>
                                <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="vendorId">
                                    <option style="font-size: 12px;" value="">Select Vendor</option>
                                    @foreach($vendors as $vendor)
                                    <option style="font-size: 12px;" value="{{ $vendor->vendor_id }}">{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                @error('vendorId') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="rate">Rate:</label>
                                <div class="input-group">
                                    <input style="font-size: 12px;" type="number" class="form-control" id="rate" wire:model="rate">
                                @error('rate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                    <select style="font-size: 12px;" class="form-control" id="rateType" wire:model="rateType">
                                    <option style="font-size: 12px;">Select Rate Type</option>
                                        <option style="font-size: 12px;" value="hourly">Per Hour</option>
                                        <option style="font-size: 12px;" value="daily">Per Day</option>
                                        <option style="font-size: 12px;" value="weekly">Per Week</option>
                                        <option style="font-size: 12px;" value="monthly">Per Month</option>
                                    </select>
                                @error('rateType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 12px;" for="endClientTimesheetRequired" class="col-form-label">End Client Time sheet required:</label>
                                    </div>
                                    <div class="col">
                                        <input style="font-size: 12px;" type="checkbox" id="endClientTimesheetRequired" wire:model="endClientTimesheetRequired">
                                    </div>
                                </div>
                                @error('endClientTimesheetRequired')
                                <span class="error" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="timeSheetType">Time Sheet Type:</label>
                                <select style="font-size: 12px;" class="form-control" id="timeSheetType" wire:model="timeSheetType">
                                <option style="font-size: 12px;" >Select Time Sheet Type</option>
                                    <option style="font-size: 12px;" value="weekly">Weekly</option>
                                    <option style="font-size: 12px;" value="semi-monthly">Semi Monthly</option>
                                    <option style="font-size: 12px;" value="monthly">Monthly</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('timeSheetType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="timeSheetBegins">Time Sheet Begins:</label>
                                <select style="font-size: 12px;" class="form-control" id="timeSheetBegins" wire:model="timeSheetBegins">
                                <option style="font-size: 12px;">Select Time Sheet Begins</option>
                                    <option style="font-size: 12px;" value="mon-fri">Monday to Friday</option>
                                    <option style="font-size: 12px;" value="mon-sat">Monday to Saturday</option>
                                    <option style="font-size: 12px;" value="sun">Sunday</option>
                                    <option style="font-size: 12px;" value="mon-wed-fri">Monday, Wednesday, Friday</option>
                                    <option style="font-size: 12px;" value="tue-thu">Tuesday, Thursday</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('timeSheetBegins') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="invoiceType">Invoice Type:</label>
                                <select style="font-size: 12px;" class="form-control" id="invoiceType" wire:model="invoiceType">
                                <option style="font-size: 12px;">Select Invoice Type</option>
                                    <option style="font-size: 12px;" value="hourly">Hourly</option>
                                    <option style="font-size: 12px;" value="daily">Daily</option>
                                    <option style="font-size: 12px;" value="weekly">Weekly</option>
                                    <option style="font-size: 12px;" value="monthly">Monthly</option>
                                    <option style="font-size: 12px;" value="project">Project-Based</option>
                                    <option style="font-size: 12px;" value="custom">Custom</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('invoiceType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;" for="paymentType">Payment Type:</label>
                                <select style="font-size: 12px;" class="form-control" id="paymentType" wire:model="paymentType">
                                <option style="font-size: 12px;">Select Payment Type</option>
                                    <option style="font-size: 12px;" value="credit_card">Credit Card</option>
                                    <option style="font-size: 12px;" value="bank_transfer">Bank Transfer</option>
                                    <option style="font-size: 12px;" value="paypal">PayPal</option>
                                    <option style="font-size: 12px;" value="check">Check</option>
                                    <option style="font-size: 12px;" value="cash">Cash</option>
                                    <option style="font-size: 12px;" value="other">Other</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('paymentType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

    <!-- Everyone tab content -->
    <div class="row" style="margin-top: 15px; width: 100%;">
        <div class="col" style="width: 150px; background-color:white;border:1px solid grey; border-radius: 5px; height: auto; margin-right: 20px; padding: 5px;">
            <div class="container" style="margin-top: 15px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 10px; cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for Company Name or ID" aria-label="Search" aria-describedby="basic-addon1">
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
                <div class="container" style="text-align: center; color: gray;">No People Found</div>
                @else
                @foreach($allCustomers as $customer)
                <div wire:click="selectCustomer('{{ $customer->customer_id }}')" class="container" style="border:1px solid darkgrey;height:auto;cursor: pointer; background-color: {{ $selectedCustomer && $selectedCustomer->customer_id == $customer->customer_id ? '#ccc' : 'white' }}; width: 500px; border-radius: 5px;padding:3px">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img style="border-radius: 50%" class="profile-image" src="{{ asset('/storage/' . $customer->customer_company_logo) }}" alt="Profile Image">
                        </div>
                        <div class="col-md-3">
                            <h6 class="username" style="font-size: 8px; color: black;">{{ $customer->customer_company_name }}</h6>
                        </div>
                        <div class="col-md-3">
                            <h6 class="username" style="font-size: 8px; color: black;">{{ $customer->customer_name }}</h6>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-0" style=" color: black;font-size:8px">(#{{ $customer->customer_id }})</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
        <div class="col-6" style="height:auto;width: 500px; background-color: #fff; border-radius: 5px;border:1px solid grey; padding: 5px">
            @if ($selectedCustomer)
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
                        font-size: 5px;
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
                            <th>Rate</th>
                            <th>End Client Timesheet Required</th>
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
                            <td>{{ $purchaseOrder->rate }}</td>
                            <td>{{ $purchaseOrder->end_client_timesheet_required }}</td>
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
            <div class="row" style="font-size: 13px;">
                <div class="row">
                    <div style="text-align: end; margin-top:15px">
                        @php
                        $selectedPerson = $selectedCustomer ?? $customers->first();
                        $isActive = $selectedPerson->status == 'active';
                        @endphp
                        @if($selectedPerson->status=="active")
                        <button wire:click="showPoList('{{ $selectedPerson->customer_id }}')" class="action-button" style="background-color:blue;border-radius:5px;border:none;color:white">Purchased Orders</button>
                        <button wire:click="addPO('{{ $selectedPerson->customer_id }}')" class="action-button" style="background-color:green;border-radius:5px;border:none;color:white">ADD Purchase Order</button>
                        @else
                        <button class="action-button" style="background-color:lightblue;border-radius:5px;border:none;color:white" disabled>Purchased Orders</button>
                        <button class="action-button" style="background-color:lightgreen;border-radius:5px;border:none;color:white" disabled>ADD Purchase Order</button>
                        @endif
                        <button wire:click="editCustomers('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'blue' : 'lightblue' }};border-radius:5px;border:none; color: white;">Edit</button>
                        <button wire:click="updateStatus('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'green' : 'red' }};border-radius:5px;border:none; color: white;">{{ $isActive ? 'Active' : 'Inactive' }}</button>
                    </div>
                    <div class="row">
                        <img class="customer-image" src="{{ asset('storage/' . optional($selectedPerson)->customer_company_logo) }}" alt="Profile Image">
                    </div>
                    <div class="col" style="margin-top: 50px; margin-right: 80px">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1; margin-left: 15%;">

                                <h2 style="font-size: 12px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->customer_company_name }}</p>

                                <h2 style="font-size: 12px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 12px;">(#{{ optional($selectedPerson)->customer_id }})</p>

                                <h2 style="font-size: 12px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->phone }}</p>
                                <h2 style="font-size: 12px;"><strong>Notes</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->notes }}</p>
                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 12px;"><strong>Address</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->address }}</p>

                                <h2 style="font-size: 12px;"><strong>Email</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->email }}</p>

                                <h2 style="font-size: 12px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->customer_name }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif

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
                        font-size: 5px;
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
                            <th>Rate</th>
                            <th>End Client Timesheet Required</th>
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
                            <td>{{ $purchaseOrder->rate }}</td>
                            <td>{{ $purchaseOrder->end_client_timesheet_required }}</td>
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
                    <div style="text-align: end; margin-top:15px">
                        @if($firstPerson->status=='active')
                        <button wire:click="showPoList('{{ $firstPerson->customer_id }}')" style="background-color:blue ;border-radius:5px;border:none; color: white;">Purchased Orders</button>
                        <button wire:click="addPO('{{ $firstPerson->customer_id }}')" style="background-color:green ;border-radius:5px;border:none; color: white;">ADD Purchase Order</button>
                        <button wire:click="editCustomers('{{ $firstPerson->id }}')" class="action-button" style="background-color:blue ;border-radius:5px;border:none; color: white;">Edit</button>
                        <button wire:click="updateStatus('{{ $firstPerson->id }}')" class="action-button" style="background-color: green;border-radius:5px;border:none; color: white;">Active</button>
                        @else
                        <button style="background-color:lightblue ;border-radius:5px;border:none; color: white;">Purchased Orders</button>
                        <button style="background-color:lightgreen ;border-radius:5px;border:none; color: white;" disabled>ADD PO</button>
                        <button class="action-button" style="background-color:lightblue ;border-radius:5px;border:none; color: white;" disabled>Edit</button>
                        <button wire:click="updateStatus('{{ $firstPerson->id }}')" class="action-button" style="background-color: red;border-radius:5px;border:none; color: white;">Inactive</button>
                        @endif
                    </div>
                    <div class="row">
                        <img class="customer-image" src="{{ asset('storage/' . optional($firstPerson)->customer_company_logo) }}" alt="Profile Image">
                    </div>
                    <div class="col" style="margin-top: 50px; margin-right: 80px">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1; margin-left: 15%;">
                                <h2 style="font-size: 12px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->customer_company_name }}</p>

                                <h2 style="font-size: 12px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 12px;">(#{{ optional($firstPerson)->customer_id }})</p>

                                <h2 style="font-size: 12px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->phone }}</p>
                                <h2 style="font-size: 12px;"><strong>Notes</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->notes }}</p>
                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 12px;"><strong>Address</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->address }}</p>

                                <h2 style="font-size: 12px;"><strong>Email</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->email }}</p>
                                <h2 style="font-size: 12px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->customer_name }}</p>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            @endif

        </div>
    </div>
    <!-- End of Everyone tab content -->
</div>