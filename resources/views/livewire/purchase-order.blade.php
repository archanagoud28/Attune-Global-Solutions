<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Microsoft Purchase Order</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchaseOrderModal">
        Open Purchase Order
    </button>
 
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
                                <p><strong>Engagement End Date:</strong> 6 months from the order</p>
                                <p><strong>Nature of Job:</strong> [Insert Nature of Job]</p>
                                <p><strong>Number of Hours per Week:</strong> [Insert Number of Hours]</p>
                                <p><strong>Basic Salary per Week:</strong> [Insert Basic Salary]</p>
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
 
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</div>