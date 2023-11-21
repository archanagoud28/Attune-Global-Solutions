<div>
    <style>
      .container{
        margin-top:30px;
        padding:0;
      }
      .calender{
        margin-top:30px;
        display:flex;
        flex-direction:row;
        justify-content:end;
        background:#ccc;
        padding:10px 15px;
        width:auto;
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
        font-size:0.875rem;
      }
      .btn{
        background:#fff;
        border:1px solid #0080f0;
        font-size:0.875rem;
        font-weight:500;
        color:#0080f0;
      }
    </style>

    <div class="container">
    <div class="calender">
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