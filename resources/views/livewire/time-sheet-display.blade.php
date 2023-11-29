

<div>
  
<meta charset="UTF-8">
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


    <div class="row" style="margin-left:40px">
        <div class="col-md-6">
      
        </div>





    </div>


    <div class="form-row mb-3" style="margin-left:40px">
          <div class="col-md-4">
            <label for="employeeName">Name : </label>
            <strong><label for="">John Doe</label></strong>
          </div>
          <div class="col-md-4">
            <label for="employeeDesignation">Designation : </label>
            <label for="">Senior Developer</label>
          </div>
          <div class="col-md-4">
            <label for="employeeID">Employee ID : </label>
            <label for="">001</label>
          </div>
        </div>
 
    @if($tab=="empInfo")
<div>
    <!DOCTYPE html>
    <html lang="en">


    <body>
<div style="display:flex">
        <h2>Time Sheet Entry</h2>
        
    <?php
    // Function to get the start and end date of the current week in dd-mm-yyyy format
    function getCurrentWeekDates() {
        // Get the current date
        $currentDate = new DateTime();
        
        // Get the first day of the current week (Sunday)
        $currentDate->modify('this week');
        
        // Get the end date (Saturday) of the current week
        $endDate = clone $currentDate;
        $endDate->modify('+6 days');
        
        return array($currentDate->format('d-m-Y'), $endDate->format('d-m-Y'));
    }

    // Call the function to get the current week dates
    list($startDate, $endDate) = getCurrentWeekDates();
    ?>

    <form action="your_action_here.php" method="post">
        <button type="submit" name="current_week" style="margin-left:400px">
            From <?php echo $startDate; ?> to <?php echo $endDate; ?>
        </button>
    </form>
</div>
        <table class="table table-bordered">
        <thead>
        <td>Leave</td>
        @foreach($daysOfWeek as $day)
            <th>{{ $day->format('D') }} <br> {{ $day->format('d-m-Y') }}</th>
        @endforeach
        <td>Total Hours</td>
        </thead>
        <tbody>
       
                <td>Holiday</td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
             
            </tr>
            <tr>
                <td>Vacation</td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
             
            </tr>
       
            </tr>
            <tr>
                <td>Sick</td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
             
            </tr>
            <tr style="background:grey">
                <td>Total</td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
                <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
             
            </tr>
        
            </tr>
            <!-- Repeat this block for different companies -->
        </tbody>
    </table>


@endif
</div>


    <button type="submit" class="save-button" style="width: 80px; margin-left: 50px;">
        <i class="fas fa-save icon" style="margin-left: -20px; width: 20px;"></i> Save
    </button>
    <button style="margin-left: 50px; border: 5px; border-radius: 1px solid silver; width: 180px; height: 30px;">Submit for Approval</button>
@endif

  </form>

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

/* Hover effect */


  </style>

</div>
