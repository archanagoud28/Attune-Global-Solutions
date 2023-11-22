<div>
<style>
.form-group{
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.input-group{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
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
        <div class="container " style=" padding:10px;background:#f2f2f2;border:1px solid #ccc;">
            <div class="col-md-12">
                <div class="emp-container" style="padding:0; margin:0 auto;">
                    <div class="card-header" style="background-color: #00234f;padding:10px;width:50%;margin-left:20%;">
                        <h5 class="mb-0" style="text-align: center;color:white;">Employee Registration Form</h5>
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
                                    <input type="text" class="form-control" wire:model="emp_id" style="margin-bottom:10px;">
                                   @error('emp_id') 
                                    <span class="text-danger">{{ $message }}</span>
                                   @enderror
                                </div>
                         
                            <div class="form-group" >
                                <label for="first_name">First Name :</label>
                                <input type="text" class="form-control" wire:model="first_name" style="margin-bottom:10px;">
                                @error('first_name') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
 
                            <div class="form-group" >
                                <label for="last_name">Last Name :</label>
                                <input type="text" class="form-control" wire:model="last_name" style="margin-bottom:10px;;">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group" >
                                        <label for="mobile_number">Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="mobile_number" style="margin-bottom:10px;;">
                                        @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group" >
                                        <label for="alternate_mobile_number">Alternate Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="alternate_mobile_number" style="margin-bottom:10px;;">
                                        @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                        <div class="form-group" >
                                                <label for="education">Education :</label>
                                                <input type="text" class="form-control" wire:model="education"  style="margin-bottom:10px;;">
                                                @error('education') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                            <div class="form-group" >
                                                <label for="experience">Experience :</label>
                                                <input type="text" class="form-control" wire:model="experience"  style="margin-bottom:10px;;">
                                                @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                <div class="form-group" >
                                    <label for="email">Email  :</label>
                                    <input type="email" class="form-control" wire:model="email" style="margin-bottom:10px;;">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="email">Company Email  :</label>
                                    <input type="email" class="form-control" wire:model="company_email" style="margin-bottom:10px;;">
                                    @error('company_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="aadhar_no">Aadhar Number :</label>
                                    <input type="text" class="form-control" wire:model="aadhar_no" style="margin-bottom:10px;;">
                                    @error('aadhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
                                <!-- Password -->
                                <div class="form-group" >
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" wire:model="password" style="margin-bottom:10px;;">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <div class="inpu-group">
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
                                </div>
                                <div>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 
                                {{-- Upload Employee Image --}}
                                <div class="form-group" >
                                    <label for="image">Employee Image :</label>
                                    <input type="file" class="form-control-file" wire:model="image" style="margin-bottom:10px;;">
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
 
                              
                               </div>
                                 <div class="employee-details">
                                <div style="margin:5px 0 20px 0"><h5>Job Details</h5></div>  

                                 <div class="form-group">
                                    <label for="hire_date">Hire Date :</label>
                                    <input type="text" class="form-control" wire:model="hire_date" style="margin-bottom:10px;;">
                                    @error('hire_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="employee_type">Employee Type :</label>
                                    <input type="text" class="form-control" wire:model="employee_type" style="margin-bottom:10px;;">
                                    @error('employee_type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="department">Department :</label>
                                    <input type="text" class="form-control" wire:model="department" style="margin-bottom:10px;;">
                                    @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="job_title">Job Title :</label>
                                    <input type="text" class="form-control" wire:model="job_title" style="margin-bottom:10px;;">
                                    @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="employee_status">Employee Status :</label>
                                    <input type="text" class="form-control" wire:model="employee_status" style="margin-bottom:10px;;">
                                    @error('employee_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               
                              
                                <div class="form-group" >
                                    <label for="aadhar_no">Job Location :</label>
                                    <input type="text" class="form-control" wire:model="job_location" style="margin-bottom:10px;;">
                                    @error('job_location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                    <div class="form-group" >
                                                <label for="company_name">Company Name :</label>
                                                <input type="text" class="form-control" wire:model="company_name" style="margin-bottom:10px;;">
                                                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="company_id">Company Id :</label>
                                                <input type="text" class="form-control" wire:model="company_id"  style="margin-bottom:10px;;">
                                                @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group" >
                                                <label for="manager_id">Manager Id :</label>
                                                <input type="text" class="form-control" wire:model="manager_id"  style="margin-bottom:10px;;">
                                                @error('manager_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="report_to">Report To :</label>
                                                <input type="text" class="form-control" wire:model="report_to"  style="margin-bottom:10px;;">
                                                @error('report_to') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                <div class="form-group" >
                                    <div class="input-group">
                                    <label>International Employee :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="inter_emp" value="yes" id="yesRadio" name="inter_emp" >
                                        <label class="form-check-label" for="yesRadio">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model="inter_emp" value="no" id="noRadio" name="inter_emp">
                                        <label class="form-check-label" for="noRadio">No</label>
                                    </div>
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
                                    <input type="text" class="form-control" wire:model="address" style="margin-bottom:10px;">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="city">City :</label>
                                    <input type="text" class="form-control" wire:model="city" style="margin-bottom:10px;">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="state">State :</label>
                                    <input type="text" class="form-control" wire:model="state" style="margin-bottom:10px;">
                                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="postal_code">Pin Code :</label>
                                    <input type="text" class="form-control" wire:model="postal_code" style="margin-bottom:10px;">
                                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="country">Country :</label>
                                    <input type="text" class="form-control" wire:model="country"style="margin-bottom:10px;">
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                               </div>
                               <div class="employee-details">
                                         <div style="margin:5px 0 20px 0"><h5>Employee Personal Details</h5></div>  

                                <div class="form-group" >
                                        <label for="date_of_birth">Date of Birth :</label>
                                        <input type="date" class="form-control" wire:model="date_of_birth" max="{{ date('Y-m-d') }}" style="margin-bottom:10px;">
                                        @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
    
                                    <div class="form-group">
                                    <label for="blood_group">Blood Group :</label>
                                    <input type="text" class="form-control" wire:model="blood_group" style="margin-bottom:10px;">
                                    @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="religion">Religion :</label>
                                    <input type="text" class="form-control" wire:model="religion" style="margin-bottom:10px;">
                                    @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="nationality">Nationality :</label>
                                    <input type="text" class="form-control" wire:model="nationality" style="margin-bottom:10px;">
                                    @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Martial Status:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="marital_status" value="unmarried" id="unmarriedRadio" name="marital_status_group">
                                            <label class="form-check-label" for="unmarriedRadio">Single</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="marital_status" value="married" id="marriedRadio" name="marital_status_group">
                                            <label class="form-check-label" for="marriedRadio">Married</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="spouse">Spouse:</label>
                                    <input type="text" class="form-control" wire:model="spouse" style="margin-bottom:10px;">
                                    @error('spouse') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Physically Challenge:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="physically_challenge" value="Yes" id="yesRadio" name="physically_challenge_group">
                                            <label class="form-check-label" for="yesRadio">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="physically_challenge" value="No" id="noRadio" name="physically_challenge_group">
                                            <label class="form-check-label" for="noRadio">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @error('physically_challenge') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                      
                                
                               </div>
                               <div class="employee-details">
                                    <div style="margin:5px 0 20px 0"><h5>Other Details</h5></div>  
                                        <div class="form-group" >
                                                <label for="nick_name">Nick Name :</label>
                                                <input type="text" class="form-control" wire:model="nick_name"  style="margin-bottom:10px;">
                                                @error('nick_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="emergency_contact">Emergency Contact :</label>
                                                <input type="text" class="form-control" wire:model="emergency_contact"  style="margin-bottom:10px;">
                                                @error('emergency_contact') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="time_zone">Time Zone :</label>
                                                <input type="text" class="form-control" wire:model="time_zone" style="margin-bottom:10px;">
                                                @error('time_zone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pf_no">PF Number :</label>
                                                <input type="text" class="form-control" wire:model="pf_no" style="margin-bottom:10px;">
                                                @error('pf_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="pan_no">Pan Number :</label>
                                                <input type="text" class="form-control" wire:model="pan_no" style="margin-bottom:10px;">
                                                @error('pan_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="biography">Biography :</label>
                                                <input type="text" class="form-control" wire:model="biography" style="margin-bottom:10px;">
                                                @error('biography') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="facebook">Facebook :</label>
                                                <input type="text" class="form-control" wire:model="facebook" style="margin-bottom:10px;">
                                                @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="linked_in">LinkedIn :</label>
                                                <input type="text" class="form-control" wire:model="linked_in" style="margin-bottom:10px;">
                                                @error('linked_in') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="twitter">Twitter :</label>
                                                <input type="text" class="form-control" wire:model="twitter" style="margin-bottom:10px;">
                                                @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="is_starred">Is Starred :</label>
                                                <input type="text" class="form-control" wire:model="is_starred" style="margin-bottom:10px;">
                                                @error('is_starred') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group" >
                                                <label for="skill_set">Skill Set :</label>
                                                <input type="text" class="form-control" wire:model="skill_set" style="margin-bottom:10px;">
                                                @error('skill_set') <span class="text-danger">{{ $message }}</span> @enderror
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

</div>