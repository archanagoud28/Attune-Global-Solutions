<div>
 
<a class="menu-link {{ Request::is('time-sheet-display') ? 'active' : '' }}" href=/time-sheet-display>
                <i class="fas fa-user-tie"></i><span class="icon-text"> Time Sheets</span>
            </a>
    <title>Save Icon Button</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
  <div class="row" style="margin-top:50px">
    <div class="col" style="text-align: center;">
      <button wire:click="$set('tab', 'timeSheet')" style="background-color:  rgb(2, 17, 79);color:white;border-radius:5px;border:5px">Employee TimeSheet</button>
    </div>
    <div class="col">
     <button wire:click="$set('tab', 'empInfo')" style="background-color:  rgb(2, 17, 79);color:white;border-radius:5px;border:5px"> Employee Info</button>
    </div>
  </div>
@if($tab=="timeSheet")
<div>
    <!DOCTYPE html>
    <html lang="en">
 
    <head>
      <meta charset="UTF-8">
      <title>Employee Information</title>
    </head>
 
    <body>
      <div class="container" style="margin-top:40px;">
        <div class="form-row">
         <div class="row">
         <div class="col">
            <label for="selectMonth">Month</label>
            <select class="form-control" id="selectMonth">
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
              <!-- Add options for all months -->
 
            </select>
          </div>
          <div class="col">
            <label for="selectYear">Year</label>
            <select class="form-control" id="selectYear">
              <!-- Add options for years as needed -->
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <!-- Add more years if necessary -->
            </select>
          </div>
         </div>
        </div>
 
        <h2>Employee Time Sheet</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Icon</th>
              <th>Name</th>
              <th>Company</th>
              <th>Week</th>
              <th>Month</th>
 
              <th>Time Sheet by Employee</th>
              <th>Time Sheet Approved by Manager</th>
              <th>Invoice raised (Y/N)</th>
            </tr>
          </thead>
          <tbody>
            <!-- Dummy Records -->
            <!-- Repeat this block for each record -->
            <!-- Replace image path, names, and other data accordingly -->
            <tr>
              <td><img src="path_to_icon_image_1" alt="Icon" width="50" height="50"></td>
              <td>John Doe</td>
              <td>ABC Company</td>
              <td>Week 1</td>
              <td>January</td>
 
              <td>Submitted</td>
              <td>Approved</td>
              <td>Yes</td>
            </tr>
            <!-- Repeat the above block for additional records (19 more times) -->
            <!-- Example record 2 -->
            <tr>
              <td><img src="path_to_icon_image_2" alt="Icon" width="50" height="50"></td>
              <td>Jane Smith</td>
              <td>XYZ Corporation</td>
              <td>Week 2</td>
              <td>January</td>
 
              <td>Pending</td>
              <td>Not Approved</td>
              <td>No</td>
            </tr>
            <!-- Repeat this block with different data for other records -->
            <!-- Total 20 records -->
          </tbody>
        </table>
      </div>
 
    </body>
 
    </html>
 
  </div>
@endif
@if($tab=="empInfo")
<div style="display: flex; align-items: center; margin-left: 40px;margin-top:20px">
    <h4 style="margin-right: 20px;">Employee Information</h4>
 
</div>
@if ($empDetails && count($empDetails) > 0)

    @foreach ($empDetails as $employee)
        <div class="form-row mb-3" style="margin-left:40px;font-size:12px">
            <div class="col-md-4">
                <label for="employeeName">Name: </label>
                <strong><label for="">{{ $employee->first_name }} {{ $employee->last_name }}</label></strong>
            </div>
            <div class="col-md-4">
                <label for="employeeDesignation">Designation: </label>
                <label for="">{{ $employee->job_title }}</label>
            </div>
            <div class="col-md-4">
                <label for="employeeID">Employee ID: </label>
                <label for="">{{ $employee->emp_id }}</label>
            </div>
        </div>
    @endforeach
    @else
    <p>No employee details found</p>
@endif


 <div style="display: flex; align-items: center; justify-content: space-between;margin-left:690px">
    <div >
        <!-- Icon for Previous Week -->
        <button wire:click="previousWeek" style="background: rgb(2, 17, 79)">
            <i class="fas fa-chevron-left"></i> 
        </button>
        
        <!-- Current Week -->
        <span>{{ $currentWeekStart }} to {{ $currentWeekEnd }}</span>
        
        <!-- Icon for Next Week -->
        <button wire:click="nextWeek" style="background: rgb(2, 17, 79)">
           <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    
    <!-- Dropdown for Selecting Future Dates -->
 
</div>

    
    <div style="display:flex;margin-left:20px;margin-top:10px">
  
        <h4 style="margin-left:20px">Time Sheet Entry</h4>
        <?php
        function getCurrentWeekDates() {
            $currentDate = new DateTime();
            $currentDate->modify('this week');
            $endDate = clone $currentDate;
            $endDate->modify('+6 days');
            return array($currentDate->format('d-m-Y'), $endDate->format('d-m-Y'));
        }
        list($startDate, $endDate) = getCurrentWeekDates();
        ?>
        <form action="your_action_here.php" method="post">
            <button type="submit" name="current_week" style="margin-left:500px; background:grey;border-radius:5px;border:1px solid black;color:white;font-size:12px">
                From <?php echo $startDate; ?> to <?php echo $endDate; ?>
            </button>
        </form>
    </div>


<!-- Your Blade view - time-sheet-display.blade.php -->

<div>
<table class="table" style="margin-left:20px;font-size:10px">
    <thead>
    <tr style="font-size:10px;">
            <th>Leave</th>
            @php
                $today = now()->startOfWeek(); // Get the start of the current week
            @endphp
            @for ($i = 0; $i < 7; $i++)
                @php
                    $day = $today->format('l');
                    $date = $today->format('d-m-Y');
                    $today->addDay(); // Move to the next day
                @endphp
                <th  class="day-date">{{ $day }}<br>{{ $date }}</th>
            @endfor
            <th>Total Hours</th>
        </tr>
    </thead>
    <tbody>
        <!-- Regular -->
        <tr>
            <td style="font-size:12px">Regular</td>
            @foreach($currentWeekDates  as $day)
                @php
                    $isEntered = (
                        (isset($hours[$day]['regular']) && $hours[$day]['regular'] !== null && $hours[$day]['regular'] !== 0) ||
                        (isset($hours[$day]['casual']) && $hours[$day]['casual'] !== null && $hours[$day]['casual'] !== 0) ||
                        (isset($hours[$day]['sick']) && $hours[$day]['sick'] !== null && $hours[$day]['sick'] !== 0)
                    );
                @endphp
                <td>
                    <input wire:model="hours.{{ $day }}.regular" 
                           type="number" 
                           name="regular[{{ $day }}][regular]" 
                           min="0" 
                           max="24" 
                           placeholder="8"
                           class="form-control"
                           style="width: 50px; font-size:10px"
                           value="8"
                           @if($isEntered) readonly @endif
                    >
                </td>
            @endforeach
            <!-- Total hours for Regular -->
            <td>
                <input type="number" 
                       value="{{ array_sum(array_column($hours, 'regular')) }}" 
                       min="0" 
                       max="24" 
                       class="form-control" 
                       disabled
                       style="width: 60px; font-size:10px"
                >
            </td>
        </tr>

        <!-- Casual -->
        <tr>
            <td style="font-size:12px">Casual</td>
            @foreach($currentWeekDates  as $day)
                @php
                    $isEntered = (
                        (isset($hours[$day]['regular']) && $hours[$day]['regular'] !== null && $hours[$day]['regular'] !== 0) ||
                        (isset($hours[$day]['casual']) && $hours[$day]['casual'] !== null && $hours[$day]['casual'] !== 0) ||
                        (isset($hours[$day]['sick']) && $hours[$day]['sick'] !== null && $hours[$day]['sick'] !== 0)
                    );
                @endphp
                <td>
                    <input wire:model="hours.{{ $day }}.casual" 
                           type="number" 
                           name="casual[{{ $day }}][casual]" 
                           min="0" 
                           max="24" 
                           placeholder="8"
                           class="form-control"
                           style="width: 50px; font-size:10px"
                           value="8"
                           @if($isEntered) readonly @endif
                    >
                </td>
            @endforeach
            <!-- Total hours for Casual -->
            <td>
                <input type="number" 
                       value="{{ array_sum(array_column($hours, 'casual')) }}" 
                       min="0" 
                       max="24" 
                       class="form-control" 
                       disabled
                       style="width: 60px; font-size:10px"
                >
            </td>
        </tr>

        <!-- Sick -->
        <tr>
            <td style="font-size:12px">Sick</td>
            @foreach($currentWeekDates  as $day)
                @php
                    $isEntered = (
                        (isset($hours[$day]['regular']) && $hours[$day]['regular'] !== null && $hours[$day]['regular'] !== 0) ||
                        (isset($hours[$day]['casual']) && $hours[$day]['casual'] !== null && $hours[$day]['casual'] !== 0) ||
                        (isset($hours[$day]['sick']) && $hours[$day]['sick'] !== null && $hours[$day]['sick'] !== 0)
                    );
                @endphp
                <td>
                    <input wire:model="hours.{{ $day }}.sick" 
                           type="number" 
                           name="sick[{{ $day }}][sick]" 
                           min="0" 
                           max="24" 
                           class="form-control"
                           style="width: 50px; font-size:10px"
                           value="8"
                           placeholder="8"
                           @if($isEntered) readonly @endif
                    >
                </td>
            @endforeach
            <!-- Total hours for Sick -->
            <td>
                <input type="number" 
                       value="{{ array_sum(array_column($hours, 'sick')) }}" 
                       min="0" 
                       max="24" 
                       class="form-control" 
                       disabled
                       style="width:60px; font-size:10px;"
                >
            </td>
        </tr>
     
        <!-- Similar logic for Casual and Sick sections -->
        <!-- ... -->
    </tbody>
</table>

<button wire:click="store" class="btn btn-primary" style="margin-left:40px;width:70px">
    <i class="fas fa-save icon" style="margin-left: -20px; width: 20px;"></i>Save
</button>

<button style="margin-left: 50px; border: 5px; border-radius: 1px solid silver; width: 180px; height: 30px;">
    Submit for Approval
</button>

</div>
@endif
<style>
 
  /* Basic button styles */
button {
 
    border: none;
    border-radius: 4px;
    background-color:grey;
    color: white;
    height:30px;
   
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    position: relative;
}
 
/* Styles for the icon */
.icon {
    position: absolute;
 
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    background-image: url('save-icon.png'); /* Replace with your icon image */
    background-size: cover;
    display: inline-block;
   
}

    .day-date {
        padding: 6px; /* Adjust this value to reduce the gap */
        font-size: 10px; /* Adjust the font size if needed */
    }


 
/* Hover effect */
 
 
  </style>
 
</div>
 