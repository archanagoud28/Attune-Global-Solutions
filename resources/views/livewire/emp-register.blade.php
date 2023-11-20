<style>
.form-group{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    font-size:0.875rem;
    align-items:center;
    margin-top:10px;
    margin-bottom:10px;
}
.form-group label{
    font-weight:500;
    color:#47515B;
    margin-bottom:10px;
}
.emp{
    display:flex;
    flex-direction:column;
    padding:5px;
    justify-content:space-between;
    margin:0 auto;
    gap:7px;
}
.employee-details{
    border:1px solid #ccc;
    padding:5px 10px;
    border-radius:10px;
    background:#fff;
}
</style>
<div>
    <div class="container" style="padding:0px;margin:30px 0;">
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
        <div class="container " style=" padding:0;background:#f2f2f2;border:1px solid #ccc;">
            <div class="col-md-12">
                <div class="emp-container" style="padding:0; margin:0 auto;">
                    <div class="card-header" style="background-color: rgb(2, 17, 79)">
                        <h5 class="mb-0" style="text-align: center;color:white;font-family:Montserrat">Employee Registration Form</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="register" enctype="multipart/form-data">
                        <div class="emp-info" style="display:flex; flex-direction:column;">
                        <div class="details-emp" style=" display:flex; flex-direction:row;padding:0; gap:0px; margin-top:10px;">
                                <div class="col-md-6" >
                                <div class="emp" >
                               <div class=" employee-details" > 
                                <div style="margin:5px 0 20px 0"><h5>Employee Details</h5></div>  
                                 <div class="form-group" >
                                  <label for="id">Employee ID :</label>
                                   <input type="text" class="form-control" wire:model="id" style="width:72%;">
                                 @error('id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            {{-- Personal Information --}}
                            <div class="form-group" >
                                <label for="first_name">First Name :</label>
                                <input type="text" class="form-control" wire:model="first_name" style="width:72%;">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
 
                            <div class="form-group" >
                                <label for="last_name">Last Name :</label>
                                <input type="text" class="form-control" wire:model="last_name" style="width:72%;">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group" >
                                        <label for="mobile_number">Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="mobile_number" style="width:72%;">
                                        @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group" >
                                        <label for="alternate_mobile_number">Alternate Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="alternate_mobile_number" style="width:72%;">
                                        @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                        <div class="form-group" >
                                                <label for="education">Education :</label>
                                                <input type="text" class="form-control" wire:model="education"  style="width:72%;">
                                                @error('education') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                            <div class="form-group" >
                                                <label for="experience">Experience :</label>
                                                <input type="text" class="form-control" wire:model="experience"  style="width:72%;">
                                                @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                <div class="form-group" >
                                    <label for="email">Email  :</label>
                                    <input type="email" class="form-control" wire:model="email" style="width:72%;">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="email">Company Email  :</label>
                                    <input type="email" class="form-control" wire:model="company_email" style="width:72%;">
                                    @error('company_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="aadhar_no">Aadhar Number :</label>
                                    <input type="text" class="form-control" wire:model="aadhar_no" style="width:72%;">
                                    @error('aadhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
                                <!-- Password -->
                                <div class="form-group" >
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" wire:model="password" style="width:72%;">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
 
                                {{-- Upload Employee Image --}}
                                <div class="form-group" >
                                    <label for="image">Employee Image :</label>
                                    <input type="file" class="form-control-file" wire:model="image" style="width:72%;">
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
 
                                <div class="form-group" >
                                    <label>Gender :</label><br>
                                    <div class="form-check form-check-inline"style="margin-top:10px;" >
                                        <input class="form-check-input" type="radio" wire:model="gender" value="Male" id="maleRadio" name="gender" >
                                        <label class="form-check-label" for="maleRadio">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-top:10px;">
                                        <input class="form-check-input" type="radio" wire:model="gender" value="Female" id="femaleRadio" name="gender">
                                        <label class="form-check-label" for="femaleRadio">Female</label>
                                    </div>
                                </div>
                                <div>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               </div>
                                 <div class="employee-details">
                                <div style="margin:5px 0 20px 0"><h5>Job Details</h5></div>  

                                 <div class="form-group">
                                    <label for="hire_date">Hire Date :</label>
                                    <input type="text" class="form-control" wire:model="hire_date" style="width:72%;">
                                    @error('hire_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="employee_type">Employee Type :</label>
                                    <input type="text" class="form-control" wire:model="employee_type" style="width:72%;">
                                    @error('employee_type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="department">Department :</label>
                                    <input type="text" class="form-control" wire:model="department" style="width:72%;">
                                    @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="job_title">Job Title :</label>
                                    <input type="text" class="form-control" wire:model="job_title" style="width:72%;">
                                    @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="employee_status">Employee Status :</label>
                                    <input type="text" class="form-control" wire:model="employee_status" style="width:72%;">
                                    @error('employee_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               
                              
                                <div class="form-group" >
                                    <label for="aadhar_no">Job Location :</label>
                                    <input type="text" class="form-control" wire:model="job_location" style="width:72%;">
                                    @error('job_location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                    <div class="form-group" >
                                                <label for="company_name">Company Name :</label>
                                                <input type="text" class="form-control" wire:model="company_name" style="width:72%;">
                                                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="company_id">Company Id :</label>
                                                <input type="text" class="form-control" wire:model="company_id"  style="width:72%;">
                                                @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group" >
                                                <label for="manager_id">Manager Id :</label>
                                                <input type="text" class="form-control" wire:model="manager_id"  style="width:72%;">
                                                @error('manager_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="report_to">Report To :</label>
                                                <input type="text" class="form-control" wire:model="report_to"  style="width:72%;">
                                                @error('report_to') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                <div class="form-group" >
                                    <label>International Employee :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="inter_emp" value="Single" id="maleRadio" name="marital_status" >
                                        <label class="form-check-label" for="maleRadio">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="inter_emp" value="Married" id="femaleRadio" name="marital_status">
                                        <label class="form-check-label" for="femaleRadio">No</label>
                                    </div>
                                </div>
                                <div>
                                    @error('inter_emp') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> 
                                 </div>
                                
                              
                               </div>
                                   
                                </div>
                               <!-- second column -->
                               <div class="col-md-6" >
                                <div class="emp" >
                               <div class=" employee-details" >     
                               <div style="margin:5px 0 20px 0"><h5>Employee Address</h5></div>  
                               <div class="form-group" >
                                    <label for="address">Address :</label>
                                    <input type="text" class="form-control" wire:model="address" style="width:75%;">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="city">City :</label>
                                    <input type="text" class="form-control" wire:model="city" style="width:75%;">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="state">State :</label>
                                    <input type="text" class="form-control" wire:model="state" style="width:75%;">
                                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="postal_code">Pin Code :</label>
                                    <input type="text" class="form-control" wire:model="postal_code" style="width:75%;">
                                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="country">Country :</label>
                                    <input type="text" class="form-control" wire:model="country"style="width:75%;">
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               </div>
                               <div class="employee-details">
                                         <div style="margin:5px 0 20px 0"><h5>Employee Personal Details</h5></div>  

                                <div class="form-group" >
                                        <label for="date_of_birth">Date of Birth :</label>
                                        <input type="date" class="form-control" wire:model="date_of_birth" max="{{ date('Y-m-d') }}" style="width:75%;">
                                        @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="form-group">
                                    <label for="blood_group">Blood Group :</label>
                                    <input type="text" class="form-control" wire:model="blood_group" style="width:75%;">
                                    @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="religion">Religion :</label>
                                    <input type="text" class="form-control" wire:model="religion" style="width:75%;">
                                    @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="nationality">Nationality :</label>
                                    <input type="text" class="form-control" wire:model="nationality" style="width:75%;">
                                    @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label>Martial Status :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="marital_status" value="Single" id="maleRadio" name="marital_status" >
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
                                <div class="form-group" >
                                    <label for="spouse">Spouse :</label>
                                    <input type="text" class="form-control" wire:model="spouse" style="width:75%;">
                                    @error('spouse') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label>Physically Challenge :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="physically_challenge" value="Single" id="maleRadio" name="marital_status" >
                                        <label class="form-check-label" for="maleRadio">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="physically_challenge" value="Married" id="femaleRadio" name="marital_status">
                                        <label class="form-check-label" for="femaleRadio">No</label>
                                    </div>
                                </div>
                                <div>
                                    @error('physically_challenge') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>              
                                
                               </div>
                               <div class="employee-details">
                                    <div style="margin:5px 0 20px 0"><h5>Other Details</h5></div>  
                                        <div class="form-group" >
                                                <label for="nick_name">Nick Name:</label>
                                                <input type="text" class="form-control" wire:model="nick_name"  style="width:72%;">
                                                @error('nick_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="emergency_contact">Emergency Contact:</label>
                                                <input type="text" class="form-control" wire:model="emergency_contact"  style="width:72%;">
                                                @error('emergency_contact') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="time_zone">Time Zone:</label>
                                                <input type="text" class="form-control" wire:model="time_zone" style="width:72%;">
                                                @error('time_zone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pf_no">PF Number:</label>
                                                <input type="text" class="form-control" wire:model="pf_no" style="width:72%;">
                                                @error('pf_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pan_no">Pan Number:</label>
                                                <input type="text" class="form-control" wire:model="pan_no" style="width:72%;">
                                                @error('pan_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="biography">Biography:</label>
                                                <input type="text" class="form-control" wire:model="biography" style="width:72%;">
                                                @error('biography') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="facebook">Facebook:</label>
                                                <input type="text" class="form-control" wire:model="facebook" style="width:72%;">
                                                @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="linked_in">LinkedIn:</label>
                                                <input type="text" class="form-control" wire:model="linked_in" style="width:72%;">
                                                @error('linked_in') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="twitter">Twitter:</label>
                                                <input type="text" class="form-control" wire:model="twitter" style="width:72%;">
                                                @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                </div>
                                </div>
                             </div>
                             
                        </div>
                        
                                <div style="text-align: center; margin-top:20px;">
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
