<div style="padding:10px 15px;">
    <!-- Add this to your HTML file -->
    <style>
        .customer-image {
            border-radius: 50%;
            height: 120px;
            width: 120px;
            border: 1px solid black;
            margin-top: 10px;
        }

        body {
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
            border: 1px solid black;

        }

        .employee-data h6 {
            font-size:0.875rem;
            font-weight:500;
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
        .employee-data{
          display:flex;
          flex-direction:row;
          justify-content:space-between;
          font-size:0.875rem;
         cursor: pointer; 
         background-color: white;
           border-radius: 5px;
           padding:5px 10px;
            align-items:center;
            transition: background-color 0.3s; 
        }
       
        .employee-data:hover {
        background-color: #456787; /* Add your desired hover background color */
    }
        .customer-details {
            margin-top: 15px;
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
        .align-data{
            display: grid; 
            grid-template-columns:  repeat(2, 1fr);
        }
    </style>

       <div style="margin-top:40px;display:flex;justify-content:flex-end;">
          <button class="button" style="padding:5px;font-size:0.875rem;"><a href="{{route('emp-register')}}" style="outline:none;text-decoration:none;color:#fff;">ADD Employees</a></button>
       </div>


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
        <div class="col-md-4" style=" background-color: #f2f2f2;; border-radius: 5px; margin-right: 20px; padding: 5px;">
            <div class="container" style="margin-top: 15px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 10px; cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for Company Name or ID" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 28px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="overflow-y: auto; max-height: 400px; margin:auto 10px;">
                @if ($allCustomers->isEmpty())
                <div class="container" style="text-align: center;">No Employee Data Found</div>
                @else
                @foreach($allCustomers as $customer)
                    <div wire:click="selectCustomer('{{ $customer->emp_id }}')" class="container employee-data" style="background-color: {{ $selectedCustomer && $selectedCustomer->emp_id == $customer->emp_id ? '#ccc' : 'white' }};">
                        <div >
                            <img style="border-radius: 50%;height:37px;width:37px;" class="profile-image" src="{{ asset('/storage/' . $customer->image) }}" alt="Profile Image">
                        </div>
                        <div >
                           {{ $customer->first_name }} {{ $customer->last_name }}
                        </div>
                        <div style="font-size:0.655rem;color:#778899;"> (#{{ $customer->emp_id }})</div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
        <div class="col-md-7" style="height:auto; background-color: rgb(2, 17, 79); border-radius: 5px;border:1px solid grey; padding: 15px 20px;color:white;">
                 <div >
                 @if ($selectedCustomer)
                   <div class="emp-content" style="display:flex;flex-direction:column; gap:20px;">
                        <div style="text-align: end; display:flex; justify-content:flex-end; gap:10px;">
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                            <button class="action-button" style="background-color: {{ $isActive ? 'green' : 'green' }};border-radius:5px;border:none;color:white;width:80px;font-size:0.725rem; padding:2px 7px;">ADD PO</button>
                            <button wire:click="editCustomers('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'blue' : 'lightblue' }};border-radius:5px;border:none; color: white;width:80px;font-size:0.795rem; padding:2px 7px;">Edit</button>
                            <button wire:click="updateStatus('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'green' : 'red' }};border-radius:5px;border:none; color: white;width:80px;font-size:0.795rem; padding:2px 7px;">{{ $isActive ? 'Active' : 'Inactive' }}</button>
                        </div>
                        <div >
                            <img class="customer-image" src="{{ asset('storage/' . optional($selectedPerson)->image) }}" alt="Profile Image">
                        </div>
                          <div class="details" style=" display:flex; flex-direction:row; line-height:2; font-size:0.895rem;margin-top:20px'" >
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Customer Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Customer ID </strong> 
                                        <span> <strong>:</strong> (#{{ optional($selectedPerson)->emp_id }})</span>
                                     </div>
                                     <div class="align-data">
                                        <strong>Phone </strong> 
                                        <span> <strong>:</strong> {{ optional($selectedPerson)->mobile_number }}</span>
                                     </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="align-data">
                                       <strong style="white-space: nowrap;">Address</strong>
                                        <span style="line-height:1.6;"><strong>:</strong> {{ optional($selectedPerson)->address }}</span>
                                    </div>
                                    <div class="align-data">
                                      <strong>Email</strong>
                                        <span><strong>:</strong> {{ optional($selectedPerson)->email }}</span>
                                    </div>
                                    <div class="align-data">
                                       <strong>Company Name</strong>
                                        <span><strong>:</strong> {{ optional($selectedPerson)->company_name }}</span>
                                    </div>
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

            <div class="emp-content" style="display:flex;flex-direction:column; gap:20px;">
                        <div style="text-align: end; display:flex; justify-content:flex-end; gap:10px;">
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                            <button class="action-button" style="background-color: {{ $isActive ? 'green' : 'green' }};border-radius:5px;border:none;color:white;width:80px;font-size:0.725rem; padding:2px 7px;">ADD PO</button>
                            <button wire:click="editCustomers('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'blue' : 'lightblue' }};border-radius:5px;border:none; color: white;width:80px;font-size:0.795rem; padding:2px 7px;">Edit</button>
                            <button wire:click="updateStatus('{{ $selectedPerson->id }}')" class="action-button" style="background-color: {{ $isActive ? 'green' : 'red' }};border-radius:5px;border:none; color: white;width:80px;font-size:0.795rem; padding:2px 7px;">{{ $isActive ? 'Active' : 'Inactive' }}</button>
                        </div>
                        <div >
                            <img class="customer-image" src="{{ asset('storage/' . optional($selectedPerson)->image) }}" alt="Profile Image">
                        </div>
                          <div class="details" style=" display:flex; flex-direction:row; line-height:2; font-size:0.895rem;margin-top:20px'" >
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Customer Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Customer ID </strong> 
                                        <span> <strong>:</strong> (#{{ optional($selectedPerson)->emp_id }})</span>
                                     </div>
                                     <div class="align-data">
                                        <strong>Phone </strong> 
                                        <span> <strong>:</strong> {{ optional($selectedPerson)->mobile_number }}</span>
                                     </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="align-data">
                                       <strong style="white-space: nowrap;">Address</strong>
                                        <span style="line-height:1.6;"><strong>:</strong> {{ optional($selectedPerson)->address }}</span>
                                    </div>
                                    <div class="align-data">
                                        <strong>Email</strong>
                                        <span style="white-space: nowrap;  max-width: calc(100% - 20px);"><strong>:</strong> {{ optional($selectedPerson)->email }}</span>
                                    </div>

                                    <div class="align-data">
                                       <strong>Company Name</strong>
                                        <span><strong>:</strong> {{ optional($selectedPerson)->company_name }}</span>
                                    </div>
                                  </div>
                          </div>
                     </div>
            @endif

        </div>
    </div>
    <!-- End of Everyone tab content -->
</div>