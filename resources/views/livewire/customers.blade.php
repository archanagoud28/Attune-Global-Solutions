<div style="padding: 50px;">
    <!-- Add this to your HTML file -->
    <style>
        .customer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .customer-card {
            background-color:white;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            overflow: hidden;
        }

        .customer-profile {
            width: 100%;
            height: auto;
            max-height: 150px;
            /* Adjust as needed */
        }

        .customer-details {
            margin-top: 10px;
        }

        .container {
            margin-top: 20px;
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

        .button {
            background-color: rgb(2, 17, 79);
            color: white;
            text-align: end;
            border-radius: 5px;
            border: none;
            margin-left: 70%;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <button wire:click="open" class="button">ADD Customers</button>
    <button wire:click="toggleView">
        {{ $viewMode === 'table' ? 'Switch to Grid' : 'Switch to Table' }}
    </button>


    @if(session()->has('success'))
    <div style="text-align: center;" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
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
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td><img style="height: 50px;width:50px" src="{{ asset('storage/' . $customer->customer_profile) }}" height="50" width="50"></td>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->company_id }}</td>
                        <td>{{ $customer->company->company_name }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->notes }}</td>
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
                    <img src="{{ asset('storage/' . $customer->customer_profile) }}" alt="Customer Profile" class="customer-profile">
                    <div class="customer-details">
                        <p><strong>ID:</strong> {{ $customer->customer_id }}</p>
                        <p><strong>Company ID:</strong> {{ $customer->company_id }}</p>
                        <p><strong>Company Name:</strong> {{ $customer->company->company_name }}</p>
                        <p><strong>Name:</strong> {{ $customer->customer_name }}</p>
                        <p><strong>Email:</strong> {{ $customer->email }}</p>
                        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                        <p><strong>Address:</strong> {{ $customer->address }}</p>
                        <p><strong>Notes:</strong> {{ $customer->notes }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    @endif
    @if($show=="true")
    <div class="modal" tabindex="-1" role="dialog" style="display: block;overflow-y:auto">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px">
                    <h5 style="padding: 5px; color: white; font-size: 15px;" class="modal-title"><b>ADD Customers Details</b></h5>
                    <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addCustomers">
                        <div>
                            <label for="customer_profile">Customer Profile:</label>
                            <input type="file" wire:model="customer_profile">
                            @error('customer_profile') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="company_id">Company ID:</label>
                            <input type="text" wire:model="company_id">
                            @error('company_id') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_name">Customer Name:</label>
                            <input type="text" wire:model="customer_name">
                            @error('customer_name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email">Email:</label>
                            <input type="email" wire:model="email">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone">Phone:</label>
                            <input type="text" wire:model="phone">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="address">Address:</label>
                            <textarea wire:model="address"></textarea>
                            @error('address') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="notes">Notes:</label>
                            <textarea wire:model="notes"></textarea>
                            @error('notes') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div style="text-align: center; justify-content: center; align-items: center; display: flex">
                            <button style="margin-left: 5%;" class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" wire:click="close" type="button">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show blurred-backdrop"></div>
    @endif


</div>