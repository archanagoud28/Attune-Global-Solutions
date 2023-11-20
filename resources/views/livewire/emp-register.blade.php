<div>
 
 
    <div style="margin-top:5px;margin-bottom:5px">
        <button style="width: 200px; border-radius: 5px; background-color: rgb(2, 17, 79); color: white;margin-left:45%"><a href="/JobSeekersAppliedJobs" style="text-decoration: none;color:white">Job Seekers Applied Jobs</a></button>
        <button style="width:200px; border-radius: 5px; background-color: rgb(2, 17, 79); color: white;"><a href="/VendorsSubmittedCVs" style="text-decoration: none;color:white">Vendors Submitted CVs</a></button>
        <button style="width:200px; border-radius: 5px; background-color: rgb(2, 17, 79); color: white;"><a href="/empregister" style="text-decoration: none;color:white">Employee Register</a></button>
        <button style="width: 80px; border-radius: 5px; background-color: rgb(2, 17, 79); color: white;" wire:click="logout">Logout</button>
    </div>
    <div class="container mt-5">
        @if (session()->has('emp_success'))
        <div class="emp-success" style="width:608px;text-align: center; color: green; padding: 10px; border-radius: 10px; margin: 0 auto; background-color: lightgreen; display: flex; justify-content: center; align-items: center;">
            <b>{{ session('emp_success') }}</b>
        </div>
 
        <script>
            setTimeout(function() {
                document.querySelector('.emp-success').style.display = 'none';
            }, 5000);
        </script>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(2, 17, 79)">
                        <h5 class="mb-0" style="text-align: center;color:white;font-family:Montserrat">Employee Registration Form</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="submit" enctype="multipart/form-data">
                           
                            {{-- Employee ID --}}
                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="id">Employee ID</label>
                                <input type="text" class="form-control" wire:model="id">
                                @error('id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- Personal Information --}}
                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" wire:model="first_name">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
 
                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" wire:model="last_name">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
 
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label>Gender</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="gender" value="Male" id="maleRadio" name="gender">
                                        <label class="form-check-label" for="maleRadio">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="gender" value="Female" id="femaleRadio" name="gender">
                                        <label class="form-check-label" for="femaleRadio">Female</label>
                                    </div>
                                </div>
                                <div>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
 
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control" wire:model="date_of_birth" max="{{ date('Y-m-d') }}">
                                    @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="mobile_number">Phone Number</label>
                                    <input type="text" class="form-control" wire:model="mobile_number">
                                    @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="alternate_mobile_number">Alternate Phone Number</label>
                                    <input type="text" class="form-control" wire:model="alternate_mobile_number">
                                    @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" wire:model="address">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" wire:model="city">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" wire:model="state">
                                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="postal_code">Pin Code</label>
                                    <input type="text" class="form-control" wire:model="postal_code">
                                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" wire:model="country">
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="hire_date">Hire Date</label>
                                    <input type="text" class="form-control" wire:model="hire_date">
                                    @error('hire_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="employee_type">Employee Type</label>
                                    <input type="text" class="form-control" wire:model="employee_type">
                                    @error('employee_type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="department">department</label>
                                    <input type="text" class="form-control" wire:model="department">
                                    @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" wire:model="job_title">
                                    @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="employee_status">Employee Status</label>
                                    <input type="text" class="form-control" wire:model="employee_status">
                                    @error('employee_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="blood_group">Blood Group</label>
                                    <input type="text" class="form-control" wire:model="blood_group">
                                    @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                  <div class="form-group" style="margin-bottom: 25px;">
                                    <label>Martial Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="marital_status" value="Single" id="maleRadio" name="marital_status">
                                        <label class="form-check-label" for="maleRadio">Single</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="marital_status" value="Married" id="femaleRadio" name="marital_status">
                                        <label class="form-check-label" for="femaleRadio">Married</label>
                                    </div>
                                </div>
                                <div>
                                    @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
        
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="religion">Religion</label>
                                    <input type="text" class="form-control" wire:model="religion">
                                    @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" wire:model="nationality">
                                    @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="aadhar_no">Aadhar Number</label>
                                    <input type="text" class="form-control" wire:model="aadhar_no">
                                    @error('aadhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" wire:model="email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
                                <!-- Password -->
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" wire:model="password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
 
                                {{-- Upload Employee Image --}}
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <label for="image">Employee Image</label>
                                    <input type="file" class="form-control-file" wire:model="image">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
 
                                </div>
 
 
                                <div>
                                   
                                    <!-- Display the saved image -->
                                    <img height="50" width="50" src="" alt="Saved Image" class="img-preview">
                                    <span></span>
                               
                                    <!-- Display the temporary image -->
                                    <img height="50" width="50" src="" alt="Temporary Image" class="img-preview">
                                    <span></span>
                                
                                </div>
 
 
 
 
                                <div style="text-align: center;">
                                <!-- Your Livewire component content -->
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Save</button>
                                <p wire:loading>Loading...</p>
                                <p wire:loading.remove></p>
                            </div>
                            <div wire:debug></div>
                            <style>
                                button[wire\:loading] {
                                    opacity: 0.5;
                                    /* Reduce opacity during loading */
                                    cursor: not-allowed;
                                    /* Change cursor during loading */
                                }
 
                                p {
                                    color: green;
                                    font-weight: bold;
                                }
                            </style>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Custom CSS classes for the "Save" button */
        .btn-save {
            background-color: #007bff;
            /* Change to your desired color */
            color: #fff;
            /* Change to your desired color */
        }
 
        /* Custom CSS classes for the "Loading" text */
        .text-loading {
            color: #ff9900;
            /* Change to your desired color */
        }
    </style>
 
</div>
 