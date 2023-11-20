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
    padding:5px 10px;
    width:75%;
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
                        <h5 class="mb-0" style="text-align: center;color:white;font-family:Montserrat">Employee Account Details</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="register" enctype="multipart/form-data">
                        <div class="emp" >
                               <div class=" employee-details" > 
                                <div style="margin:5px 0 20px 0"><h5>Employee Account Details</h5></div>  
                                 <div class="form-group" >
                                  <label for="id">Employee ID :</label>
                                   <input type="text" class="form-control" wire:model="id" style="width:80%;">
                                 @error('id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            {{-- Personal Information --}}
                            <div class="form-group" >
                                <label for="first_name">First Name :</label>
                                <input type="text" class="form-control" wire:model="first_name" style="width:80%;">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
 
                            <div class="form-group" >
                                <label for="last_name">Last Name :</label>
                                <input type="text" class="form-control" wire:model="last_name"style="width:80%;" >
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group" >
                                        <label for="mobile_number">Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="mobile_number" style="width:80%;">
                                        @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group" >
                                        <label for="alternate_mobile_number">Alternate Phone Number :</label>
                                        <input type="text" class="form-control" wire:model="alternate_mobile_number" style="width:80%;">
                                        @error('alternate_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                        <div class="form-group" >
                                                <label for="education">Education :</label>
                                                <input type="text" class="form-control" wire:model="education" style="width:80%;" >
                                                @error('education') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                            <div class="form-group" >
                                                <label for="experience">Experience :</label>
                                                <input type="text" class="form-control" wire:model="experience" style="width:80%;">
                                                @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                <div class="form-group" >
                                    <label for="email">Email  :</label>
                                    <input type="email" class="form-control" wire:model="email" style="width:80%;">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="email">Company Email  :</label>
                                    <input type="email" class="form-control" wire:model="company_email" style="width:80%;">
                                    @error('company_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group" >
                                    <label for="aadhar_no">Aadhar Number :</label>
                                    <input type="text" class="form-control" wire:model="aadhar_no" style="width:80%;">
                                    @error('aadhar_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
 

                             
                               </div>
                        
                                <div style="text-align: center; margin-top:20px;">
                                <!-- Your Livewire component content -->
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Save</button>
                            </div>
                            <div wire:debug></div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
</div>
