<div style="padding:20px">
    <html>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #343a40;
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

    </html>

    <body>
        <p style="text-align: end;margin-top:15px">
            <button style="margin-right: 10px;" wire:click="addPO" class="button">ADD PO</button>
        </p>

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
                            <form wire:submit.prevent="saveSalesOrder">
                                @csrf
                                <div class="form-group">
                                    <label for="contractorService">
                                        <div class="row">
                                            <div class="col" style="font-size: 12px;">
                                                Check this box if the service is provided by a Contractor
                                            </div>
                                            <div class="col">
                                                <input type="checkbox" id="contractorService" name="contractorService" value="1" wire:model="contractorService">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="vendorName" style="font-size: 12px;">Consultant Name:</label>
                                    <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="customerId">
                                        <option style="font-size: 12px;" value="">Select Consultant</option>
                                        @foreach($customers as $customer)
                                        <option style="font-size: 12px;" value="{{ $customer->customer_id }}">{{ $customer->customer_company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customerId') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 12px;" for="rate">Job Title:</label>
                                    <div class="input-group">
                                        <input style="font-size: 12px;" type="number" class="form-control" id="rate" wire:model="rate">
                                        @error('rate') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col">
                                        <label style="font-size: 12px;" for="start_date">Start Date:</label>
                                        <input style="font-size: 12px;" type="date" wire:model="startDate" id="start_date" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label style="font-size: 12px;" for="end_date">End Date:</label>
                                        <input style="font-size: 12px;" type="date" wire:model="endDate" id="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 12px;" for="paymentType">Vendor Name:</label>
                                    <select style="font-size: 12px;" class="form-control" id="vendorName" wire:model="customerId">
                                        <option style="font-size: 12px;" value="">Select Vendor</option>
                                        @foreach($customers as $customer)
                                        <option style="font-size: 12px;" value="{{ $customer->customer_id }}">{{ $customer->customer_company_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customerId') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
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
                                    <label style="font-size: 12px;" for="paymentType">Payment Type:</label>
                                    <select style="font-size: 12px;" class="form-control" id="paymentType" wire:model="paymentType">
                                        <option style="font-size: 12px;">Select Payment Type</option>
                                        <option style="font-size: 12px;" value="Credit Card">Credit Card</option>
                                        <option style="font-size: 12px;" value="Bank Transfer">Bank Transfer</option>
                                        <option style="font-size: 12px;" value="Paypal">PayPal</option>
                                        <option style="font-size: 12px;" value="Check">Check</option>
                                        <option style="font-size: 12px;" value="Cash">Cash</option>
                                        <option style="font-size: 12px;" value="Other">Other</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('paymentType') <span class="error" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 12px;" for="paymentType">Payment Terms:</label>
                                    <input style="font-size: 12px;" type="text" class="form-control" id="rate" wire:model="rate" placeholder="Ex: Net 0,New 10,........">

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
        <p style="text-align: center;">
        <button style="margin-right: 100px;" class="button">View SO's</button>
        <button   class="button">View PO's</button>

        </p>
    </body>

</div>