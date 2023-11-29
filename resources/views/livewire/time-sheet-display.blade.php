<div>
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
  <div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Time Sheet Entry</title>
    </head>

    <body>
      <div class="container mt-4">
        <h2>Employee Information</h2>
        <div class="row">
          <div class="col-md-6">
            <!-- Dummy employee names -->
            <select id="dropdown">
              <option value="option1">John Doe</option>
              <option value="option2">Jane Smith</option>
              <option value="option3">Michael Johnson</option>
              <option value="option4">Emily Davis</option>
            </select>
            <!-- Add more employee names as needed -->
          </div>
        </div>
        <div class="form-row mb-3">
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

        <h2>Time Sheet Entry</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Name of the Company</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
              <th>Sun</th>
            </tr>
          </thead>
          <tbody>
            <!-- Rows for different types of entries -->
            <!-- Regular, Vacation, Leave, Unpaid, Any Other -->
            <!-- Input fields for hours for each day of the week -->
            <tr>
              <td>Company 1</td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
            </tr>
            <tr>
              <td>Company 2</td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
            </tr>
            <tr>
              <td>Company 3</td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="8" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
              <td><input type="number" value="0" min="0" max="24" class="form-control"></td>
            </tr>
            <!-- Repeat the above block for different types of entries -->
            <!-- Vacation, Leave, Unpaid, Any Other -->
          </tbody>
        </table>
      </div>

    </body>

    </html>

  </div>
  @endif
</div>