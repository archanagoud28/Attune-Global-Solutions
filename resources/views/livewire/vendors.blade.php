<div style="padding:20px">

    <!-- Add this to your HTML file -->
    <style>
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

    <p style="text-align: start;">
        <button style="margin-right: 5px;" wire:click="open" class="button">ADD Vendors</button>
        <button style="margin-right: 5px;" wire:click="addPO" class="button">ADD PO</button>

    </p>
    @if(session()->has('vendor'))
    <div id="successAlert" style="text-align: center;" class="alert alert-success">
        {{ session('vendor') }}
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
    <div class="row" style="height:150px">
        @php
        $selectedPerson = $selectedVendor ?? $vendors->first();
        $isActive = $selectedPerson->status == 'active';
        @endphp
        <div class="col-md-3" style="background-color: #f2f2f2;margin-right:5px">
            <img style="height: 160px;" src="https://www.ibousa.org/wp-content/uploads/Vendors-e1503453975329.png" alt="">
        </div>
        <div class="col-md-8" style="background-color: #f2f2f2; padding: 8px">
            <p style="text-align: start">
                <button style="margin-right: 10px;" wire:click="editVendors('{{$selectedPerson->id}}')" class="button">Edit</button>
            </p>
            @if ($selectedVendor)
            <div class="row" style="font-size: 13px;">
                <div class="row">
                    @php
                    $selectedPerson = $selectedVendor ?? $vendors->first();
                    $isActive = $selectedPerson->status == 'active';
                    @endphp


                    <div class="col">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1; ">

                                <h2 style="font-size: 10px;"><strong>Vendor Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->vendor_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Vendor ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($selectedPerson)->vendor_id }})</p>


                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->address }}</p>

                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->email }}</p>


                            </div>
                            <div style="flex: 1;margin-left: 8%;">

                                <h2 style="font-size: 10px;"><strong>Contact Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->phone_number }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($selectedPerson)->contact_person }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @elseif (!$vendors->isEmpty())

            <!-- Display details of the first person in the list -->
            @php
            $firstPerson = $vendors->first();
            $starredPerson = DB::table('vendor_details')
            ->where('vendor_id', $firstPerson->vendor_id)
            ->first();
            @endphp

            <div class="row" style="font-size: 13px;">
                <div class="row">

                    <div class="col" style=" margin-right: 80px">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1;;">
                                <h2 style="font-size: 10px;"><strong>Vendor Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->vendor_name }}</p>

                                <h2 style="font-size: 10px;"><strong>Vendor ID</strong></h2>
                                <p style="font-size: 10px;">(#{{ optional($firstPerson)->vendor_id }})</p>



                            </div>

                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Address</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->address }}</p>
                                <h2 style="font-size: 10px;"><strong>Email</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->email }}</p>

                            </div>
                            <div style="flex: 1;margin-left: 8%;">
                                <h2 style="font-size: 10px;"><strong>Vendor Phone</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->phone_number }}</p>
                                <h2 style="font-size: 10px;"><strong>Contact Name</strong></h2>
                                <p style="font-size: 10px;">{{ optional($firstPerson)->contact_person }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>



    @if($show=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>ADD Vendors Details</b></h5>
                    <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addVendors">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Vendor Company Logo:</label>
                            <input type="file" wire:model="vendor_profile">
                            @error('vendor_profile') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Vendor Name:</label>
                            <input type="text" wire:model="vendor_name">
                            @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Vendor Company Name:</label>
                            <input type="text" wire:model="vendor_company_name">
                            @error('vendor_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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
                    <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Edit Vendors Details</b></h5>
                    <button wire:click="closeEdit" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                        <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateVendors">
                        <div>
                            <label for="customer_profile" style="font-size: 12px;">Vendor Company Logo:</label>
                            <input type="file" wire:model="vendor_profile">
                            @error('vendor_profile') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name" style="font-size: 12px;">Vendor Name:</label>
                            <input type="text" wire:model="vendor_name">
                            @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_company_name" style="font-size: 12px;">Vendor Company Name:</label>
                            <input type="text" wire:model="vendor_company_name">
                            @error('vendor_company_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                            <button style="margin-left: 5%; font-size: 12px;" class="btn btn-success" type="submit">Update</button>
                            <button class="btn btn-danger" wire:click="close" type="button" style="font-size: 12px;">Cancel</button>
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

    <!-- Everyone tab content -->

    <div class="row" style="margin-top: 15px;height:300px">
        <div class="col-md-3" style="background-color:#f2f2f2; height: auto; padding: 5px;margin-right:5px;max-height:300px;overflow-y:auto">
            <div class="container" style="margin-top: 8px;margin-bottom:8px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 10px; cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for vendors" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 30px; border-radius: 0 5px 5px 0; background-color: #007BFF; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="font-size: 13px">
                @if ($allVendors->isEmpty())
                <div class="container" style="text-align: center; color: gray;">No Vendors Found</div>
                @else
                @foreach($allVendors as $vendor)
                <div wire:click="selectVendor('{{ $vendor->vendor_id }}')" class="container-1" style="margin-bottom:2px;height:25px;cursor: pointer; background-color: {{ $selectedVendor && $selectedVendor->vendor_id == $vendor->vendor_id ? '#ccc' : 'white' }}; width: 500px; border-radius: 5px;padding:5px">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6 class="username" style="font-size: 10px; color: black;">{{ $vendor->vendor_name }}</h6>
                        </div>
                        <div class="col-md-3">
                            <h6 class="username" style="font-size: 8px; color: black;">{{ $vendor->phone_number }}</h6>
                        </div>
                        <div class="col-md-4">
                            <h6 class="username" style="font-size: 8px; color: black;">#({{ $vendor->vendor_id }})</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
        <div class="col-md-8" style="background-color: #f2f2f2; padding: 5px;max-height:300px;overflow-y:auto">
            @php
            $selectedPerson = $selectedVendor ?? $vendors->first();
            $isActive = $selectedPerson->status == 'active';
            @endphp
            <div style="text-align: start;">
                <button wire:click="showBills('{{$selectedPerson->vendor_id}}')" style="{{ $activeButton === 'Bills' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    Bills & Sent Payments
                </button>

                <button wire:click="updateAndShowPoList('{{$selectedPerson->vendor_id}}')" style="{{ $activeButton === 'PO' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }} margin-right: 5px; border-radius: 5px; border: none;">
                    PO
                </button>

                <button wire:click="$set('activeButton', 'EmailActivities')" style="{{ $activeButton === 'EmailActivities' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 5px; border-radius: 5px; border: none;">
                    Email Activities
                </button>
                <button wire:click="$set('activeButton', 'Notes')" style="{{ $activeButton === 'Notes' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 5px; border-radius: 5px; border: none;">
                    Notes
                </button>
                <button wire:click="$set('activeButton', 'Contacts')" style="{{ $activeButton === 'Contacts' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}margin-right: 5px; border-radius: 5px; border: none;">
                    Contacts
                </button>
            </div>
            @if($activeButton=="PO")

            <!-- resources/views/livewire/purchase-order-table.blade.php -->

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>PO Number</th>
                            <th>Vendor ID</th>
                            <th>Vendor Name</th>
                            <th>Employee Name</th>
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
                            <td colspan="11" style="text-align: center;">PurchaseOrders Not Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            @endif

            @if($activeButton=="Bills")
            <table class="table">
                <thead>
                    <tr>
                        <th>Bill Number</th>
                        <th>Vendor ID</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Payment Terms</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Currency</th>
                        <th>Notes</th>
                        <th>Billed By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bills as $bill)
                    <tr>
                        <td>{{ $bill->bill_number }}</td>
                        <td>{{ $bill->vendor_id }}</td>
                        <td>{{ $bill->amount }}</td>
                        <td>{{ $bill->due_date }}</td>
                        <td>{{ $bill->payment_terms }}</td>
                        <td>{{ $bill->description }}</td>
                        <td>{{ $bill->status }}</td>
                        <td>{{ $bill->currency }}</td>
                        <td>{{ $bill->notes }}</td>
                        <td>{{ $bill->company->company_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" style="text-align: center;">Bills Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            @endif



        </div>
    </div>
    <!-- End of Everyone tab content -->
</div>