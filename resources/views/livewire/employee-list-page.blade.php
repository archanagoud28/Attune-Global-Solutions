<div style="padding:10px 15px; background:#fff; ">
    <!-- Add this to your HTML file -->
    <style>
        .customer-image {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            border: 2px solid #fcfcfc ;
        }

        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Roboto', sans-serif;
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
           line-height:1;
           cursor: pointer; 
           margin-top:-15px;
           white-space: nowrap;
           gap:20px;
           font-size:0.725rem;
           padding:5px 10px;
            align-items:center;
            transition: background-color 0.3s; 
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
        .contractor-btn {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size:0.825rem;
            padding: 4px auto;
            transition: background-color 0.3s ease-in-out;
        }

        .contractor-btn:hover {
            background-color: #0056b3;
        }
        .button-btn{
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size:0.725rem;
            padding: 4px auto;
            transition: background-color 0.3s ease-in-out;
        }
        .details{
            display:flex;flex-direction:row; justify-content:space-between;font-size:0.725rem;
        }

        .error {
            color: red;
        }
        .align-data{
            display: grid; 
            grid-template-columns: 100px 1fr;
            margin-bottom: 5px; 
        }
        .align-data strong {
        white-space: nowrap;
        margin-right: 5px; /* Adjust the value to control the space between strong and colon */
    }
        /* Style for the container with scrolling */
      .scroll-container {
          overflow-y: auto;
          min-height: 250px;
          max-height: 400px;
          margin-top:-10px;
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
      @media (max-width: 760px) {
    .details {
        flex-direction: column;
        align-items: flex-start;
    }

    .col-md-6 {
        width: 100%;
        margin-bottom: 10px; /* Add some space between the columns */
    }
  
}

    </style>

       <div style="margin-top:40px;display:flex;justify-content:flex-end; ">
          <button class="button" style="text-align:center; padding:3px 10px;font-size:0.795rem;"><a href="{{route('emp-register')}}" style="outline:none;text-decoration:none;color:#fff;">ADD Contractors</a></button>
          <button class="button" style="text-align:center; padding:3px 10px;font-size:0.795rem;margin-left:10px;"><a href="{{route('employee-list-page')}}" style="outline:none;text-decoration:none;color:#fff;">Contractor List</a></button>
       </div>


     <div>
     @if(session()->has('success'))
    <div style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   

    <div class="row" style="margin-top: 10px; width: 100%;paddng:0;">
       <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px;    margin-right: 10px; padding: 5px;">
       </div>
       <div class="col-md-8 info" style=" background-color: #f2f2f2; border-radius: 5px; padding: 15px 20px; display: flex; flex-direction: column;">
       <div >
                 @if ($selectedCustomer)
                   <div class="emp-content" >
                        <div >
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                        </div>
                          <div class="details">
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
                                        <span style="white-space: nowrap; overflow-wrap: break-word; max-width: calc(100% - 20px);"><strong>:</strong> {{ optional($selectedPerson)->company_email }}</span>
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

            <div class="emp-content" >
                        <div >
                            @php
                            $selectedPerson = $selectedCustomer ?? $customers->first();
                            $isActive = $selectedPerson->status == 'active';
                            @endphp
                            
                        </div>
                      
                          <div class="details"  >
                              
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
                                        <span style="white-space: nowrap; overflow-wrap: break-word; max-width: calc(100% - 20px);"><strong>:</strong> {{ optional($selectedPerson)->company_email }}</span>
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
     
       @if ($allCustomers->isEmpty())
    <div class="container" style="border:1px solid #ccc; display:flex; flex-direction:column; width:80%;border-radius:10px;box-shadow:1px 1px 0px 0 rgba(0,0,0,0.1);">
            <img src="https://img.freepik.com/premium-vector/no-data-concept-illustration_86047-488.jpg" alt="" style="width:400px; height:400px;">
            <p style="color:#778899; text-align:center; font-weight:500;">No data found</p>
     @else
    <div class="row" style="margin-top: 10px; width: 100%; padding:0;">
        <div class="col-md-3" style=" background-color: #f2f2f2;; border-radius: 5px; margin-right: 10px; ">
            <div class="container" style="margin-top: 15px;">
                <div class="row" >
                    <div class="col" style="margin: 0px; padding: 0px">
                        <div class="input-group">
                            <input wire:model="searchTerm" style="font-size: 11px; width:80%;cursor: pointer; border-radius: 5px 0 0 5px;" type="text" class="form-control" placeholder="Search for Name or ID" aria-label="Search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button wire:click="filter" style="height: 28px; border-radius: 0 5px 5px 0; background-color: #003767; color: #fff; border: none;" class="btn" type="button">
                                    <i style="text-align: center;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scroll-container" >
              @foreach($allCustomers as $customer)
                    <div wire:click="selectCustomer('{{ $customer->emp_id }}')" class="container" style="background-color: {{ $selectedCustomer && $selectedCustomer->emp_id == $customer->emp_id ? '#ccc' : 'white' }}; border-radius: 5px; padding:10px auto;">
                        <div class="employee-data">
                            <span style="font-size: 0.795rem;  display: block;white-space: nowrap;text-overflow: ellipsis;  max-width: 150px;  line-height: 1.2;overflow: hidden;">{{ $customer->first_name }} {{ $customer->last_name }}</span> 
                            <span style="color: #778899; font-size: 0.625rem;">(#{{ $customer->emp_id }})</span>
                        </div>
                    </div>
                @endforeach

                @endif
            </div>
        </div>

        <!-- Details of the selected person -->
      
            <div class="col-md-8" style=" background-color: #f2f2f2; border-radius: 5px; padding: 10px 15px;">
            <div style="text-align: start; diplay:flex;">
                @php
                $selectedPerson = $selectedCustomer ?? $customers->first();
                $isActive = $selectedPerson->status == 'active';
                @endphp
                <button class="button-btn">Invoices & Payments</button>
                <button class="button-btn">Email Activities</button>
                <button class="button-btn">Notes</button>
                <button class="button-btn">Time Sheets</button>
            </div>
        </div>
     </div>
    </div>

</div>