<div>
  <style>
    .card {
      margin-bottom: 15px;
      position: relative;
      height: 400px;
    }

    .card-body {
      line-height: 1;
      margin: 0;
      text-align: start;
      padding: 10px 15px;
    }

    h2 {
      margin-bottom: 10px;
    }

    .card-content {
      font-size: 0.785rem;
      font-weight: 500;
      color: #778899;
    }

    .card-mid {
      height: 130px;
      margin-bottom: 7px;
    }

    .card-content span {
      font-size: 0.725rem;
      color: black;
      font-weight: 500;
    }

    .pink-background {
      position: absolute;
      bottom: 0;
      left: 0;
      font-weight: 600;
      width: 100%;
      font-size: 0.785rem;
      background-color: #e8e8e8;
      text-align: center;
      padding: 5px 10px;
    }

    .btn {
      padding: 2px;
      width: 100px;
      font-size: 0.825rem;
    }
  </style>
  <div class="container" style="padding: 10px 15px; margin: 30px auto;background:#fff;">
    <h3>Employees</h3>
    <div class="row">
      <div class="modal fade" id="purchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Purchase Order</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Company Name:</strong> Microsoft</p>
                  </div>
                  <div class="col-md-6">

                    <p><strong>Employee Name:</strong> John Doe</p>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <h4>Engagement Details:</h4>
                    <p><strong>Engagement End Date:</strong> 1 month from the order</p>
                    <p><strong>Nature of Job:</strong> UI Developer</p>
                    <p><strong>Number of Hours per Week:</strong> 12hrs</p>
                    <p><strong>Basic Salary per Week:</strong> 7,000</p>
                    <p><strong>Time Sheet Cycle:</strong> 15 days</p>
                    <!-- You can add more details and customize the layout as needed -->
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px; ">
          <div class="card-body">
            <p class="card-text"><strong>Mr. Joe Ucuzoglu</strong></p>
            <div class="card-mid">
              <p class="card-content">Attune Global Solutions</p>
              <p class="card-content">Microsoft</p>
              <p class="card-content">joe.ucuzoglu@ags.com</p>
              <p class="card-content">Join Date: <span>11 Nov, 2023</span></p>
              <p class="card-content">End Date: <span>11 Dec, 2023</span></p>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchaseOrderModal">
              Purchase Order
            </button>
            <div class="pink-background" style="height: 25px;">UI Developer</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="https://static.vecteezy.com/system/resources/thumbnails/002/002/427/small/man-avatar-character-isolated-icon-free-vector.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px;">
          <div class="card-body">
            <p class="card-text"><strong>Mr. Thierry Delaporte</strong></p>
            <div class="card-mid">
              <p class="card-content">Attune Global Solutions</p>
              <p class="card-content">thierry.delaporte@ags.com</p>
              <p class="card-content">Join Date: <span>15 Nov, 2023</span></p>
              <p class="card-content">End Date: <span>25 Dec, 2023</span></p>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchaseOrderModal">
              Purchase Order
            </button>
            <div class="pink-background" style="height: 25px;"> Full Stock Developer</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px;">
          <div class="card-body">
            <p class="card-text"><strong>Mr. Anil Kumar</strong></p>
            <div class="card-mid">
              <p class="card-content">PayG</p>
              <p class="card-content">keki.mistry@payg.in</p>
              <p class="card-content">Present: <span class="bench" style="font-weight:600;">On Bench</span></p>
            </div>

            <div class="pink-background" style="height: 25px;">PHP Developer</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="https://static.vecteezy.com/system/resources/previews/005/026/528/non_2x/illustration-female-avatar-in-flat-style-free-vector.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px;">
          <div class="card-body">
            <p class="card-text"><strong>Ms. Bhargavi</strong></p>
            <div class="card-mid">
              <p class="card-content">PayG</p>
              <p class="card-content">keki.mistry@payg.in</p>
              <p class="card-content">Present: <span class="bench" style="font-weight:600;">On Bench</span></p>
            </div>

            <div class="pink-background" style="height: 25px;">Angular Developer</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <img src="https://static.vecteezy.com/system/resources/thumbnails/001/993/889/small/beautiful-latin-woman-avatar-character-icon-free-vector.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px;">
          <div class="card-body">
            <p class="card-text"><strong>Ms. Keki Mistry</strong></p>
            <div class="card-mid">
              <p class="card-content">Attune Global Solutions</p>
              <p class="card-content">keki.mistry@ags.com</p>
              <p class="card-content">Present: <span class="bench" style="font-weight:600;">On Bench</span></p>
            </div>

            <div class="pink-background" style="height: 25px;">Backend Developer</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="https://static.vecteezy.com/system/resources/thumbnails/002/002/332/small/ablack-man-avatar-character-isolated-icon-free-vector.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px;">
          <div class="card-body">
            <p class="card-text"><strong>Mr. Jagadish Kumar</strong></p>
            <div class="card-mid">
              <p class="card-content">Attune Global Solutions</p>
              <p class="card-content">keki.mistry@payg.in</p>
              <p class="card-content">Present: <span class="bench" style="font-weight:600;">On Bench</span></p>
            </div>

            <div class="pink-background" style="height: 25px;">Frontend Developer</div>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="card">
          <img src="https://static.vecteezy.com/system/resources/thumbnails/002/002/403/small/man-with-beard-avatar-character-isolated-icon-free-vector.jpg" class="card-img-top" alt="Image 1" style="width:150px;height:150px;">
          <div class="card-body">
            <p class="card-text"><strong>Mr. Nithin Mistry</strong></p>
            <div class="card-mid">
              <p class="card-content">Attune Global Solutions</p>
              <p class="card-content">keki.mistry@ags.in</p>
              <p class="card-content">Present: <span class="bench" style="font-weight:600;">On Bench</span></p>
            </div>

            <div class="pink-background" style="height: 25px;">UI/UX Developer</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>