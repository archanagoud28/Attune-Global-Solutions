<div>
    <style>
      .container{
        margin-top:30px;
        padding:0;
      }
      .calender{
        margin-top:40px;
        display:flex;
        flex-direction:row;
        align-items:center;
        background:#fcfcfc;
        margin-left:65%;
        border:1px solid #ccc;
        padding:10px 15px;
        width:35%;
        border-radius:10px;
      }
      .main-cont{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        margin-top:20px;
        background:#fff;
        border:1px solid #ccc;
        padding:10px 15px;
        border-radius:10px;
        align-items:center;
      }
      .text p{
        font-size:0.875rem;
      }
      .text h6{
        font-weight:600;
        color:#003767;
      }
      .btn{
        background:#003767;
        border:1px solid #003767;
        font-size:0.875rem;
        font-weight:500;
        color:#fff;
        width:100px;
      }
      .view-container{
        display:flex;
        margin-top:30px;
      }
      .view{
        border:1px solid #003767;
        border-radius:7px;
        background:#f1f8ff;
        padding:5px 10px;
      }
      .view h6{
        font-size:0.9rem;
        font-weight:600;
        color:#003767;
      }
      .vendor-icon{
         display:flex;
         flex-direction:column;
        align-items:center;
      }
      .vendor-icon{
        font-weight:600;
      }
      .vendors{
        background:#fff;
        color:#003767;
        border:1px solid #003767;
        border-radius:4px;
        font-size:0.725rem;
        font-weight:600;
        width:50px;
      }
    </style>
 
    <div class="container">
    <div class="calender">
    <i class="fas fa-calendar-alt"></i>
        <time id="current-time" datetime="<?= date('Y-m-d\TH:i:sP'); ?>">
            <?= date('l, F j, Y H:i:s'); ?>
        </time>
    </div>
 
    <script>
        const currentTimeElement = document.getElementById('current-time');
        const eventSource = new EventSource('time.php');
 
        eventSource.onmessage = function(event) {
            currentTimeElement.innerHTML = event.data;
        };
 
        eventSource.onerror = function(error) {
            console.error('EventSource failed:', error);
            eventSource.close();
        };
    </script>
 
    <!-- row containers -->
    <div class="view-container">
         <div class="col-md-3">
            <div class="view">
                <h6>Customers</h6>
                <div class="vendor-icon">
                    <p>10</p>
                   <button class="vendors">View</button>
              </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="view">
                <h6>Vendors</h6>
                <div class="vendor-icon">
                    <p>10</p>
                   <button class="vendors">View</button>
              </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="view">
               <h6>Employees</h6>
               <div class="vendor-icon">
                    <p>120</p>
                   <button class="vendors">View</button>
              </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="view">
                <h6>Contractors</h6>
                <div class="vendor-icon">
                    <p>20</p>
                   <button class="vendors">View</button>
              </div>
            </div>
         </div>
    </div>
    <div class="main-cont">
        <div class="text">
            <h6>Welcome Bandari Divya, your dashboard is ready!</h6>
            <p>Great Job, your affiliate dashboard is ready to go!You can view profiles,vendors,customers and purchase orders.</p>
            <button class="btn ">View Profile</button>
        </div>
        <div class="image">
            <img src="https://img.freepik.com/free-vector/modern-business-team-working-open-office-space_74855-5541.jpg" alt="" style="width:300px;height:200px;">
        </div>
    </div>
</div>
</div>