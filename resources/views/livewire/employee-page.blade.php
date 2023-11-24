<div>
<style>
.card {
    margin-bottom: 15px;
    position: relative;
    height: 400px;
    z-index: 1;
      transition: transform 0.3s, box-shadow 0.3s ease;/* Add transition for smooth effect */
}

.card:hover {
    transform: scale(1.02); /* Increase the size on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow on hover */
}

.card-body {
    line-height: 1;
    margin: 0;
    text-align: start;
    padding: 10px 15px;
    transition: background-color 0.3s ease; /* Add transition for background color */
}

.card:hover .card-body {
    background-color: #f8f9fa; /* Change background color on hover */
}

.card-content {
    font-size: 0.785rem;
    font-weight: 500;
    color: #778899;
    transition: color 0.3s ease; /* Add transition for text color */
}

.card:hover .card-content {
    color: #495057; /* Change text color on hover */
}

#purchaseOrderModal {
    z-index: 1100; /* Adjust the value as needed */
}

.table {
            width: 100%;
            font-size: 12px;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
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

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }


h4{
    margin-bottom:10px;
    color:#002555;
}

.card-mid{
    height:130px;
    margin-bottom:7px;
}

.card-content span{
    font-size:0.725rem;
    color:black;
    font-weight:500;
}

    .pink-background {
      position: absolute;
      bottom: 0;
      color:#fff;
      display:flex;
      justify-content:center;
      align-items:center;
      border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
      left: 0;
      font-weight: 600;
      width: 100%;
      font-size: 0.875rem;
      background-color: #002555;
      text-align: center;
      padding: 15px ;
    }
.btn{
    padding:2px;
    width:100px;
    font-size:0.825rem;
}
.add-emp{
    background:#002555;
    border:none;
    color:white;
    font-size:0.895rem;
    padding:5px 10px;
    margin-right:10px;
    border-radius:7px;
}
#purchaseOrderModal {
    z-index: 1100; /* Adjust the value as needed */
}
</style>
    <div class="container" style="padding: 10px 15px; margin: 30px auto;background:#fff;">
    <div style="display:flex;justify-content:end; "><button class="add-emp"><a style="text-decoration:none; outline:none;color:white;" href="{{route('emp-register')}}">Add Employee</a></button>
    <button class="add-emp"wire:click="toggleView">
        {{ $viewMode === 'table' ? 'Switch to Grid' : 'Switch to Table' }}
    </button>
</div>
  <h4>Employees List</h4>
  <div class="row">
  <div class="modal fade" id="purchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Purchase Order</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Company Name:</strong> Microsoft</p>
                  </div>
                  <div class="col-md-6">

                    <p><strong>Employee Name:</strong> John Doe</p>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <h4>Engagement Details:</h4>
                    <p><strong>Engagement End Date:</strong> 1 month from the order</p>
                    <p><strong>Nature of Job:</strong> UI Developer</p>
                    <p><strong>Number of Hours per Week:</strong> 12hrs</p>
                    <p><strong>Basic Salary per Week:</strong> 7,000</p>
                    <p><strong>Time Sheet Cycle:</strong> 15 days</p>
                    <!-- You can add more details and customize the layout as needed -->
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
    <!-- tabular view -->
    @if($employees->isEmpty())
            <div class="container" style="border:1px solid #ccc; display:flex; flex-direction:column; width:80%;border-radius:10px;box-shadow:1px 1px 0px 0 rgba(0,0,0,0.1)">
            <img src="https://img.freepik.com/premium-vector/add-user-concept-illustration_86047-677.jpg" alt="" style="width:400px; height:400px;">
            <p style="color:#778899; text-align:center; font-weight:500;">No data found</p>
            </div>
        @else
    @if($viewMode === 'table')
    <!-- Render Table View -->
    <table class="table table-striped table-bordered">
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>ID</th>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Skill set</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $customer)
                    <tr>
                        <td><img style="height: 35px;width: 35px" src="{{ asset('storage/' . $customer->employee_image) }}" height="50" width="50"></td>
                        <td>{{ $customer->emp_id }}</td>
                        <td>{{ $customer->company_id }}</td>
                        <td>{{ $customer->company_name }}</td>
                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->skill_set }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- resources/views/livewire/customer-form.blade.php -->
        </div>
    </table>
    @else
      
    <!-- gerid view -->
   
    @foreach ($employees as $employee)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('/storage/' . $employee->employee_image) }}" class="card-img-top" 
                            style="width:150px;height:150px; ">
                        <div class="card-body">
                            <p class="card-text"><strong>Mr. {{ $employee->first_name }} {{ $employee->last_name}}</strong></p>
                            <div class="card-mid">
                                <p class="card-content"> <strong>Company :</strong> {{ $employee->company_name }}</p>
                                <p class="card-content"> <strong>Email :</strong> {{ $employee->email }}</p>
                                <p class="card-content"><strong>Join Date :</strong> <span> {{ $employee->join_date }}</span></p>
                                <p class="card-content"><strong>End Date :</strong> <span> {{ $employee->end_date }}</span></p>
                            </div>
                            <div style="display:flex;justify-content:center">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchaseOrderModal" >
                                Purchase Order
                              </button>
                            </div>
                            <div class="pink-background" style="height: 25px;">{{ $employee->skill_set }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $employees->links() }}
    </div>
    @endif
    @endif
</div>