<div style="padding:10px 15px; background:#fff;">
    <!-- Add this to your HTML file -->
    <style>
        .customer-image {
            border-radius: 50%;
            height: 120px;
            width: 120px;
            border: 2px solid #fcfcfc ;
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
           gap:15px;
           line-height:1;
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
            grid-template-columns: 120px 1fr;
            margin-bottom: 5px; 
        }
        .align-data strong {
        white-space: nowrap;
        margin-right: 5px; /* Adjust the value to control the space between strong and colon */
    }
    .scroll-container {
          overflow-y: auto;
          max-height: 350px;
          margin: auto 10px;
          scrollbar-width: thin; /* For Firefox */
          scrollbar-color: #ccc transparent; /* For Firefox */

          /* For WebKit browsers (Chrome, Safari) */
          &::-webkit-scrollbar {
              width: 4px;
          }

          &::-webkit-scrollbar-thumb {
              background-color: #ccc;
              border-radius: 4px;
          }

          &::-webkit-scrollbar-track {
              background-color: transparent;
          }
      }

      /* Style for the employee-data items */
      .container.employee-data {
          transition: background-color 0.3s;
      }

      .container.employee-data:hover {
          background-color: #456787;
      }


    </style>

       <div style="margin-top:40px;display:flex;justify-content:flex-end;">
          <button class="button" style="padding:5px;font-size:0.875rem;"><a href="{{route('emp-register')}}" style="outline:none;text-decoration:none;color:#fff;">ADD Employees</a></button>
          <button class="button" style="padding:5px;font-size:0.875rem;margin-left:10px;"><a href="{{route('contractor-page')}}" style="outline:none;text-decoration:none;color:#fff;">Contarctors List</a></button>
       </div>

    <!-- Everyone tab content -->
    @if ($allCustomers->isEmpty())
    <div class="container" style="border:1px solid #ccc; display:flex; flex-direction:column; width:80%;border-radius:10px;box-shadow:1px 1px 0px 0 rgba(0,0,0,0.1)">
            <img src="https://img.freepik.com/premium-vector/no-data-concept-illustration_86047-488.jpg" alt="" style="width:400px; height:400px;">
            <p style="color:#778899; text-align:center; font-weight:500;">No data found</p>
     @else
    <div class="row" style="margin-top: 15px; width: 100%;height:100%;">
    <div>
        <h5 style="color:rgb(2, 17, 79);font-weight:400;">Employees List</h5>
    </div>
        <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px; margin-right: 20px; padding: 5px;">
            <div class="container" style="margin-top: 15px">
                <div class="row">
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 11px; width:70%;cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for Name or ID" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 30px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scroll-container" >
               
                @foreach($allCustomers as $customer)
                    <div wire:click="selectCustomer('{{ $customer->emp_id }}')" class="container employee-data" style="background-color: {{ $selectedCustomer && $selectedCustomer->emp_id == $customer->emp_id ? '#ccc' : 'white' }};">
                        <div >
                            <img style="border-radius: 50%;height:37px;width:37px;" class="profile-image" src="{{ asset('/storage/' . $customer->image) }}" alt="Profile Image">
                        </div>
                        <div >
                           <span style="font-size:0.895rem;">{{ $customer->first_name }} {{ $customer->last_name }}</span> <span style="color:#778899;font-size:0.625rem;">(#{{ $customer->emp_id }})</span>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
      
        <div class="col-md-8" style="height:auto; background-color: rgb(2, 17, 79); border-radius: 5px;border:1px solid grey; padding: 15px 20px;color:white;">
                 <div >
                 @if ($selectedCustomer)
                   <div class="emp-content" style="display:flex;flex-direction:column; gap:20px;">
                        <div style="text-align: end; display:flex; justify-content:flex-end; gap:10px;">
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                        </div>
                        <div >
                            <img class="customer-image" src="{{ asset('storage/' . optional($selectedPerson)->image) }}" alt="Profile Image">
                        </div>
                          <div class="details" style=" display:flex; flex-direction:row; line-height:2; font-size:0.895rem;margin-top:20px'" >
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Employee Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Employee ID </strong> 
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
                                      <strong>Company Email</strong>
                                        <span><strong>:</strong> {{ optional($selectedPerson)->company_email }}</span>
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
                            
                        </div>
                        <div >
                            <img class="customer-image" src="{{ asset('storage/' . optional($selectedPerson)->image) }}" alt="Profile Image">
                        </div>
                          <div class="details" style=" display:flex; flex-direction:row; line-height:2; font-size:0.895rem;margin-top:20px'" >
                                <div class="col-md-6" >
                                    <div class="align-data">
                                        <strong>Employee Name </strong> 
                                        <span><strong>:</strong> {{ optional($selectedPerson)->first_name }} {{ optional($selectedPerson)->last_name }}</span>
                                    </div>
                                     <div class="align-data">
                                        <strong>Employee ID </strong> 
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
                                        <strong>Company Email</strong>
                                        <span ><strong>:</strong> {{ optional($selectedPerson)->company_email }}</span>
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