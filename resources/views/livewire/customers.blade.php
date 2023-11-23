<div>
    <!-- Add this to your HTML file -->
    <style>
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

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            background-color: #f8f9fa;
            color: #343a40;
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



        .customer-profile {
            width: 120px;
            height: 120px;
            max-height: 120px;
            max-width: 120px;
            background-color: green;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid rgb(2, 17, 79);
        }

        .customer-details {
            margin-top: 15px;
        }

        .container {
            margin-top: 30px;
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
        <button wire:click="toggleView" style="padding:3px;background-color: blue;border-radius:5px;color:#fff;border:none">
            {{ $viewMode === 'table' ? 'Switch to Grid' : 'Switch to Table' }}
        </button>
    </p>


    @if(session()->has('success'))
    <div style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
   
    @if($viewMode === 'table')
    <!-- Render Table View -->
    <table class="table table-striped table-bordered">
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Notes</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td><img style="height: 50px;width:50px;background-color:green;border-radius:50%;border:2px solid rgb(2, 17, 79)" src="{{ asset('/storage/' . $customer->customer_profile) }}" height="50" width="50"></td>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->company_id }}</td>
                        <td>{{ $customer->company->company_name }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->notes }}</td>
                        <td><button style="background-color: blue;color:white;border-radius:5px;border:none;margin-bottom:5px">Edit</button><button style="background-color: green;color:white;border-radius:5px;border:none">Active</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- resources/views/livewire/customer-form.blade.php -->
        </div>
    </table>
    @else
    <!-- Render Grid View -->
    <div class="grid-container">
        <div class="container">
            <div class="customer-grid">
                @foreach ($customers as $customer)
                <div class="customer-card">
                    <img src="{{ asset('/storage/' . $customer->customer_profile) }}" alt="Customer Profile" class="customer-profile">
                    <div class="customer-details">
                        <div style="text-align: center;"><strong>{{ $customer->customer_name }}</strong> </div>
                        <div style="text-align: center;font-size:14px;color:#0056b3">{{ $customer->company->company_name }}</div>
                        <div style="text-align: center;">{{ $customer->email }}</div>
                        <div style="text-align: center;">{{ $customer->phone }}</div>
                        <div style="text-align: center;">{{ $customer->address }}</div>
                        <p style="text-align: center;margin-top:8px"> <button style="background-color: blue;color:white;border-radius:5px;border:none">Edit</button>
                            <button style="background-color: green;color:white;border-radius:5px;border:none">Active</button>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    @endif



</div>
