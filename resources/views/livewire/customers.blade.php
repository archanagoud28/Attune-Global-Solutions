<div style="padding:20px">
    <!-- Add this to your HTML file -->
    <style>
        .customer-image {
            border-radius: 2;
            height: 100px;
            width: 300px;
            border: 1px solid black;
            margin-top: 10px;
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

        .input-group {
            margin-bottom: 10px;
        }

        .profile-image,
        .people-image,
        .customer-profile {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5%;
            border: 1px solid black;

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
    </style>

    <p style="margin-top: 50px;text-align:end;margin-right:25px">
        <button wire:click="open" class="button">ADD Customers</button>
    </p>


    @if(session()->has('success'))
    <div style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
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


    <!-- Everyone tab content -->
    <div class="row" style="margin-top: 15px; width: 100%;">
        <div class="col" style="width: 150px; background-color: rgb(2, 17, 79); border-radius: 5px; height: auto; margin-right: 20px; padding: 5px;">
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
                <div wire:click="selectCustomer('{{ $customer->customer_id }}')" class="container" style="height:auto;cursor: pointer; background-color: {{ $selectedCustomer && $selectedCustomer->customer_id == $customer->customer_id ? '#ccc' : 'white' }}; width: 500px; border-radius: 5px;padding:3px">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img style="border-radius: 0%" class="profile-image" src="{{ asset('/storage/' . $customer->customer_company_logo) }}" alt="Profile Image">
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
            <div class="row" style="font-size: 13px;">
                <div class="row">
                    <div style="text-align: end;">
                        @php
                        $selectedPerson = $selectedCustomer ?? $customers->first();
                        $isActive = $selectedPerson->status == 'active';
                        @endphp
                        <button class="action-button" style="background-color: {{ $isActive ? 'green' : 'green' }};border-radius:5px;border:none;color:white">ADD PO</button>
                        <button wire:click="editCustomers('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'blue' : 'lightblue' }};border-radius:5px;border:none; color: white;">Edit</button>
                        <button wire:click="updateStatus('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'green' : 'red' }};border-radius:5px;border:none; color: white;">{{ $isActive ? 'Active' : 'Inactive' }}</button>
                    </div>
                    <div class="row">
                        <img class="customer-image" src="{{ asset('storage/' . optional($selectedPerson)->customer_company_logo) }}" alt="Profile Image">
                    </div>
                    <div class="col" style="margin-top: 50px; margin-right: 80px">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1; margin-right: 20px;">
                                <h2 style="font-size: 12px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->customer_name }}</p>

                                <h2 style="font-size: 12px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 12px;">(#{{ optional($selectedPerson)->customer_id }})</p>

                                <h2 style="font-size: 12px;"><strong>Contact Details</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->phone }}</p>
                                <h2 style="font-size: 12px;"><strong>Notes</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->notes }}</p>
                            </div>

                            <div style="flex: 1;">
                                <h2 style="font-size: 12px;"><strong>Address</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->address }}</p>

                                <h2 style="font-size: 12px;"><strong>Email</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->email }}</p>

                                <h2 style="font-size: 12px;"><strong>Company Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($selectedPerson)->customer_company_name }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @elseif (!$customers->isEmpty())
            <!-- Display details of the first person in the list -->
            @php
            $firstPerson = $customers->first();
            $starredPerson = DB::table('customer_details')
            ->where('customer_id', $firstPerson->customer_id)
            ->first();
            @endphp

            <div class="row" style="font-size: 13px;">
                <div class="row">
                    <div style="text-align: end;">
                        @if($firstPerson->status=='active')
                        <button style="background-color:green ;border-radius:5px;border:none; color: white;">ADD PO</button>
                        <button wire:click="editCustomers('{{ $firstPerson->id }}')" class="action-button" style="background-color:blue ;border-radius:5px;border:none; color: white;">Edit</button>
                        <button wire:click="updateStatus('{{ $firstPerson->id }}')" class="action-button" style="background-color: green;border-radius:5px;border:none; color: white;">Active</button>
                        @else
                        <button style="background-color:green ;border-radius:5px;border:none; color: white;">ADD PO</button>
                        <button class="action-button" style="background-color:lightblue ;border-radius:5px;border:none; color: white;" disabled>Edit</button>
                        <button wire:click="updateStatus('{{ $firstPerson->id }}')" class="action-button" style="background-color: red;border-radius:5px;border:none; color: white;">Inactive</button>
                        @endif
                    </div>
                    <div class="row">
                        <img class="customer-image" src="{{ asset('storage/' . optional($firstPerson)->customer_company_logo) }}" alt="Profile Image">
                    </div>
                    <div class="col" style="margin-top: 50px; margin-right: 80px">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 1; margin-right: 20px;">
                                <h2 style="font-size: 12px;"><strong>Customer Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->customer_name }}</p>

                                <h2 style="font-size: 12px;"><strong>Customer ID</strong></h2>
                                <p style="font-size: 12px;">(#{{ optional($firstPerson)->customer_id }})</p>

                                <h2 style="font-size: 12px;"><strong>Contact Details</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->phone }}</p>
                                <h2 style="font-size: 12px;"><strong>Notes</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->notes }}</p>
                            </div>

                            <div style="flex: 1;">
                                <h2 style="font-size: 12px;"><strong>Address</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->address }}</p>

                                <h2 style="font-size: 12px;"><strong>Email</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->email }}</p>

                                <h2 style="font-size: 12px;"><strong>Company Name</strong></h2>
                                <p style="font-size: 12px;">{{ optional($firstPerson)->customer_company_name }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- End of Everyone tab content -->
</div>
