<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('/images/fav.png')}}">
    <title>Attune Global Solutions</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <livewire:styles />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
        }
 
        .menu-link {
            font-size: 12px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-right: 15px;
            margin-left: 15px;
        }
 
        .menu-link:hover,
        .menu-link.active {
            color: orange;
        }
 
 
        .fas {
            width: 25px;
        }
 
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
 
        .container-fluid {
            padding: 0;
            margin: 0;
            display: flex;
        }
 
        .col-md-2 {
            background-color: rgb(2, 17, 79);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 17%;
        }
 
        .col-md-10 {
            margin-left: 17%;
        }
 
        .row-header {
            background-color: rgb(2, 17, 79);
            height: 50px;
            position: fixed;
            top: 0;
            left: 0;
            width: 83%;
            margin-left: 17%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
 
        .row-content {
            background-color: #fff;
            margin-top: 20px;
 
        }
 
        .overflow-auto {
            height: auto;
            overflow: auto;
        }
    </style>
</head>
 
<body>
    @guest
    @livewire('hr-login')
    @else
    <div class="container-fluid">
        <div class="col-md-2">
            <img src="{{asset('/images/logonobg.png')}}" style="width: 200px; height: 50px; margin: 8px auto;" alt="">
            <a class="menu-link" href="/customers"><i class="fas fa-mobile-alt"></i><span class="icon-text"> Customers</span></a><br>
            <a class="menu-link" href="vendor-page"><i class="fas fa-university"></i><span class="icon-text"> Vendors</span></a><br>
            <a class="menu-link" href="employee-page"><i class="fas fa-users"></i><span class="icon-text"> Employees</span></a><br>
            <a class="menu-link" href="contractor-page"><i class="fas fa-user-tie"></i><span class="icon-text"> Contractors</span></a><br>
            <a class="menu-link" href="#"><i class="fas fa-file-invoice-dollar"></i><span class="icon-text"> Purchase Orders</span></a><br>
            <a class="menu-link" href="#"><i class="fas fa-file-invoice"></i><span class="icon-text"> Bills</span></a><br>
            <a class="menu-link" href="#"><i class="fas fa-receipt"></i><span class="icon-text"> Invoice</span></a> <br>
            <a class="menu-link" href="/time-sheet-display"><i class="fas fa-clipboard-list"></i><span class="icon-text"> Time Sheets</span></a><br>
        </div>
 
        <div class="col-md-10">
            <div class="row-header d-flex justify-content-between align-items-center" style=" z-index: 1000;">
                <h4 style="color: white; margin-left:40%" class="text-center mb-0">Vendor Bloom</h4>
                @livewire('log-out')
            </div>

            <div class="row-content">
                <div class="overflow-auto">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
 
    @livewireScripts
    @endguest
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
 
</html>