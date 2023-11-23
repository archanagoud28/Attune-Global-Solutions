<!-- resources/views/livewire/employee-list-page.blade.php -->

<div class="container mt-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="starred-tab-link" data-toggle="tab" href="#starred-tab">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="everyone-tab-link" data-toggle="tab" href="#everyone-tab">Active</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <!-- Starred tab content -->
        <div class="tab-pane fade show active" id="starred-tab">
            <div class="row">
                <!-- Search input and filter button -->
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for Emp.Name or ID" wire:model="search" aria-label="Search" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" >
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Display the filtered employee list -->
                    <ul class="list-group mt-3">
                        @foreach($this->employees as $employee)
                            <li class="list-group-item" wire:click="selectEmployee({{ $employee->id }})">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Details of the selected person -->
              <!-- Details of the selected person -->
                <div class="col-8">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('path_to_static_image.jpg') }}" alt="Profile Image">
                        <div class="card-body">
                            <button class="btn btn-light">
                                <i class="fa fa-star text-yellow"></i>
                            </button>
                            <h5 class="card-title">{{ $selectedPerson->first_name }} {{ $selectedPerson->last_name }}</h5>
                            <p class="card-text">
                                <strong>(#{{ $selectedPerson->emp_id }})</strong><br>
                                Contact Details <strong>{{ $selectedPerson->contact_details }}</strong><br>
                                CATEGORY <strong>{{ $selectedPerson->category }}</strong><br>
                                Location <strong>{{ $selectedPerson->location }}</strong><br>
                                Joining Date <strong>{{ $selectedPerson->joining_date }}</strong><br>
                                Date Of Birth <strong>{{ $selectedPerson->date_of_birth }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
        <!-- End of Starred tab content -->

        <!-- Everyone tab content -->
        <div class="tab-pane fade" id="everyone-tab">
            <div class="row">
                <!-- Search input and filter button -->
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for Emp.Name or ID" wire:model="search" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" wire:click="clearSearch">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Display the filtered employee list -->
                    <ul class="list-group mt-3">
                        @foreach($filteredEmployees as $employee)
                            <li class="list-group-item" wire:click="selectEmployee({{ $employee->emp_id }})">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Details of the selected person -->
                
            </div>
        </div>
        <!-- End of Everyone tab content -->
    </div>
</div>

@livewireScripts
