<div style="padding: 20px;">
    <style>
        .error{
            font-size: 12px;
            color: red;
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

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #343a40;
        }

        .button {
            background-color: rgb(2, 17, 79);
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            padding: 3px;
            font-size: 12px;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>

    <body>
        <p style="text-align: start;margin-top:15px">
            <button wire:click="show" style="margin-right: 10px;" class="button">ADD Bill</button>
            <button wire:click="showInvoice" style="margin-right: 10px;" class="button">ADD Invoice</button>
        </p>
        @if(session()->has('add-bill'))
        <div id="successAlert" style="text-align: center;" class="alert alert-success">
            {{ session('add-bill') }}
        </div>
        @elseif(session()->has('add-invoice'))
        <div id="salesOrderAlert" style="text-align: center;" class="alert alert-success">
            {{ session('add-invoice') }}
        </div>
        @endif
        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
                document.getElementById('salesOrderAlert').style.display = 'none';
            }, 5000);
        </script>
        @if($invoice=="true")
        <!-- resources/views/livewire/add-invoice.blade.php -->

        <div>
            <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                            <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Add Invoice</b></h5>
                            <button wire:click="closeInvoice" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                                <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="addInvoice">
                             

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Customer Name:</label>
                                    <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="customer_name">
                                        <option style="font-size: 12px;" value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                        <option style="font-size: 12px;" value="{{ $customer->customer_id }}">{{ $customer->customer_company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="amount" style="font-size: 12px;">Amount:</label>
                                    <input type="text" wire:model="amount">
                                    @error('amount') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="due_date" style="font-size: 12px;">Due Date:</label>
                                    <input type="date" wire:model="due_date">
                                    @error('due_date') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="payment_terms" style="font-size: 12px;">Payment Terms:</label>
                                    <input type="text" wire:model="payment_terms">
                                    @error('payment_terms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="description" style="font-size: 12px;">Description:</label>
                                    <textarea wire:model="description"></textarea>
                                    @error('description') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="status" style="font-size: 12px;">Status:</label>
                                    <input type="text" wire:model="status">
                                    @error('status') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="currency" style="font-size: 12px;">Currency:</label>
                                    <input type="text" wire:model="currency">
                                    @error('currency') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="notes" style="font-size: 12px;">Notes:</label>
                                    <textarea wire:model="notes"></textarea>
                                    @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>


                                <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                                    <button style="font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-backdrop fade show blurred-backdrop"></div>
        </div>

        @endif
        @if($bill=="true")
        <!-- resources/views/livewire/add-bill.blade.php -->
        <div class="modal" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(2, 17, 79); height: 50px;">
                        <h5 style="padding: 5px; color: white; font-size: 12px;" class="modal-title"><b>Add Bill</b></h5>
                        <button wire:click="close" type="button" class="close" style="border:none" data-dismiss="modal" aria-label="Close">
                            <span style="color:rgb(2, 17, 79)" aria-hidden="true" style="color: white;">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addBill">

                            <div class="form-group">
                                <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Vendor Name:</label>
                                <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="vendor_name">
                                    <option style="font-size: 12px;" value="">Select Vendor</option>
                                    @foreach($vendors as $vendor)
                                    <option style="font-size: 12px;" value="{{ $vendor->vendor_id }}">{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_name') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>


                            <div>
                                <label for="amount" style="font-size: 12px;">Amount:</label>
                                <input type="text" wire:model="amount">
                                @error('amount') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="due_date" style="font-size: 12px;">Due Date:</label>
                                <input type="date" wire:model="due_date">
                                @error('due_date') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="payment_terms" style="font-size: 12px;">Payment Terms:</label>
                                <input type="text" wire:model="payment_terms">
                                @error('payment_terms') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="description" style="font-size: 12px;">Description:</label>
                                <textarea wire:model="description"></textarea>
                                @error('description') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="status" style="font-size: 12px;">Status:</label>
                                <input type="text" wire:model="status">
                                @error('status') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="currency" style="font-size: 12px;">Currency:</label>
                                <input type="text" wire:model="currency">
                                @error('currency') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="notes" style="font-size: 12px;">Notes:</label>
                                <textarea wire:model="notes"></textarea>
                                @error('notes') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                            </div>


                            <div style="text-align: center; justify-content: center; align-items: center; display: flex; margin-top: 10px;">
                                <button style="font-size: 12px;" class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show blurred-backdrop"></div>

        @endif
        <p style="text-align: center;">
            <button class="button" wire:click="$set('activeButton', 'Bills')" style="{{ $activeButton === 'Bills' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }}; margin-right: 10px; border-radius: 5px; border: none">
                View Bill's
            </button>
            <button class="button" wire:click="$set('activeButton', 'Invoices')" style="{{ $activeButton === 'Invoices' ? 'background-color: rgb(2, 17, 79); color: white;' : 'background-color: grey; color: white;' }};margin-right: 10px; border-radius: 5px; border: none;">
                View Invoice's
            </button>

            @if($activeButton=="Invoices")
        <table class="table">
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Payment Terms</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Currency</th>
                    <th>Notes</th>
                    <th>Invoiced By</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->customer_id }}</td>
                    <td>{{ $invoice->customer->customer_company_name }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->due_date }}</td>
                    <td>{{ $invoice->payment_terms }}</td>
                    <td>{{ $invoice->description }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->currency }}</td>
                    <td>{{ $invoice->notes }}</td>
                    <td>{{ $invoice->company->company_name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" style="text-align: center;">Invoices Not Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @endif

        @if($activeButton=="Bills")
        <table class="table">
            <thead>
                <tr>
                    <th>Bill Number</th>
                    <th>Vendor ID</th>
                    <th>Vendor Name</th>
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
                    <td>{{ $bill->vendor->vendor_name }}</td>
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
        </p>




    </body>
</div>