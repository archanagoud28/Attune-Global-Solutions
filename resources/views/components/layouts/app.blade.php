<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('/images/Small.png')}}">
    <title>Consultant Management System</title>
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
            padding: 4px;

        }
        .menu-link > i {
            margin-left: 8px;
        }


        .menu-link:hover{
           
           border-radius: 4px;
            background-color:#fff3;
        }
        .menu-link.active {
            color: rgb(2, 17, 79);
            background-color: white;
           border-radius: 4px
        }




        .fas {
            width: 25px;
        }


        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            overflow: hidden;
        }


        .container-fluid {
            padding: 0;
            margin: 0;
            display: flex;
        }


        .col-md-2 {
            background-color: rgb(2, 17, 79);
            color: white;
            /* position: fixed; */
            top: 0;
            left: 0;
            height: 100vh;
            /* width: 17%; */
        }


        /* .col-md-10 {
            margin-left: 17%;
        } */


        .row-header {
            background-color: rgb(2, 17, 79);
            /* height: 50px; */
            /* position: fixed; */
            /* top: 0;
            left: 0; */
            /* width: 83%; */
            /* margin-left: 17%; */
            /* display: flex; */
            /* justify-content: center;
            align-items: center; */ 
        }


        .row-content {
            background-color: #fff;
            margin-top: 2px;


        }


        .overflow-auto {
            height: calc(100vh - 60px);
            overflow: auto;
        }
 
        .menu-link.active {
        color: rgb(2, 17, 79);
        font-size:12px;
        background-color: white;
        border-radius: 4px;
        /* width:97% You can adjust the text color for the active state */
    }
    @media only screen and (max-width: 768px) {
        .displayNone {
            display: none !important;
        }
        .displayBlock {
            display: block !important;
        }
        #col-md-2 {
            position: absolute;
            /* background: #fff; */
            border: 1px solid #e0dddd;
            border-radius:0px;
            height: auto; 
            width: fit-content; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            top: 3.1em;
            z-index: 1000;
        }
        .setHeight {
            height: calc(90vh - 80px);
            overflow: scroll;
        }
        .fullContaint {
            width: 100% !important;
        }
    }
    @media only screen and (min-width: 769px) {
        .hideHamburger {
            display: none !important;
        }
       
    }
    </style>
</head>


<body>
    <div class="row m-0">
    @guest
    @livewire('hr-login')
    @else
        @if(Auth::guard('hr')->check())
            <div class="col-md-2 displayNone" id="col-md-2">
                <img src="{{asset('/images/CMSLogo.png')}}" style="width: 200px; height: 70px; margin: 8px auto;" alt="">
                <div style="margin-top:15px;" class="setHeight">
                <a class="menu-link {{ Request::is('/') ? 'active' : '' }}" href="/"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>
 
                <a class="menu-link {{ Request::is('customers') ? 'active' : '' }}" href="/customers"><i class="fas fa-mobile-alt"></i><span class="icon-text"> Customers</span></a><br>

                <a class="menu-link {{ Request::is('vendor-page') ? 'active' : '' }}" href="/vendor-page"><i class="fas fa-university"></i><span class="icon-text"> Vendors</span></a><br>

                <a class="menu-link {{ Request::is('employee-list-page') ? 'active' : '' }}" href="employee-list-page"><i class="fas fa-users"></i><span class="icon-text"> Employees</span></a><br>

                <a class="menu-link {{ Request::is('contractor-page') ? 'active' : '' }}" href="contractor-page"><i class="fas fa-user-tie"></i><span class="icon-text"> Contractors</span></a><br>

                <a class="menu-link {{ Request::is('sales-purchase-orders') ? 'active' : '' }}" href="/salesOrPurchase"><i class="fas fa-file-invoice-dollar"></i><span class="icon-text"> SO / PO</span></a><br>

                <a class="menu-link {{ Request::is('bills') ? 'active' : '' }}" href="/billsOrInvoices"><i class="fas fa-file-invoice"></i><span class="icon-text"> Bills / Invoices</span></a><br>

                <a class="menu-link {{ Request::is('time-sheet-display') ? 'active' : '' }}" href="/time-sheet-display"><i class="fas fa-clipboard-list"></i><span class="icon-text"> Time Sheets</span></a><br>

                </div>
            </div>
        @elseif(Auth::guard('vendor')->check())
                <div class="col-md-2 displayNone" id="col-md-2">
                    <img src="{{asset('/images/CMSLogo.png')}}" style="width: 200px; height: 50px; margin: 8px auto;" alt="">
                     <div  style="margin-top:15px;">
                      <a class="menu-link {{ Request::is('vendor-home') ? 'active' : '' }}" href="/vendor-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>

                     <a class="menu-link {{ Request::is('vendor-pages') ? 'active' : '' }}" href="/vendor-pages"><i class="fas fa-university"></i><span class="icon-text"> Vendors</span></a><br>
                      {{-- <a class="menu-link" href="vendor-pages"><i class="fas fa-university"></i><span class="icon-text"> Vendors</span></a><br>  --}}
                     </div>
                </div>
        @elseif(Auth::guard('customer')->check())
                <div class="col-md-2 displayNone" id="col-md-2">
                    <img src="{{asset('/images/CMSLogo.png')}}" style="width: 200px; height: 50px; margin: 8px auto;" alt="">
                     <div  style="margin-top:15px;">
                        <a class="menu-link {{ Request::is('customer-home') ? 'active' : '' }}" href="/customer-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>
                        <a class="menu-link {{ Request::is('customer-pages') ? 'active' : '' }}" href="/customer-pages"><i class="fas fa-mobile-alt"></i><span class="icon-text"> Customers</span></a><br>
                        {{-- <a class="menu-link" href="/customer-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>
                        <a class="menu-link" href="/customer-pages"><i class="fas fa-mobile-alt"></i><span class="icon-text"> Customers</span></a><br> --}}
                     </div>
                </div>
        @elseif(Auth::guard('contractor')->check())
                <div class="col-md-2 displayNone" id="col-md-2">
                    <img src="{{asset('/images/CMSLogo.png')}}" style="width: 200px; height: 50px; margin: 8px auto;" alt="">
                    <div style="margin-top:15px;">
                       <a class="menu-link {{ Request::is('contractor-home') ? 'active' : '' }}" href="/contractor-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>

                        <a class="menu-link {{ Request::is('contractor-pages') ? 'active' : '' }}" href="/contractor-pages"><i class="fas fa-user-tie"></i><span class="icon-text"> Contractors</span></a><br>
                        {{-- <a class="menu-link" href="/contractor-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>
                        <a class="menu-link" href="contractor-pages"><i class="fas fa-user-tie"></i><span class="icon-text"> Contractors</span></a><br> --}}
                      </div>
                </div>

            @elseif(Auth::guard('employee')->check())
                <div class="col-md-2 displayNone" id="col-md-2">
                    <img src="{{asset('/images/CMSLogo.png')}}" style="width: 200px; height: 50px; margin: 8px auto;" alt="">
                    <div style="margin-top:15px;">
                    <a class="menu-link {{ Request::is('employee-home') ? 'active' : '' }}" href="/employee-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>
                    <a class="menu-link {{ Request::is('employee-pages') ? 'active' : '' }}" href="/employee-pages"><i class="fas fa-user-tie"></i><span class="icon-text"> Employees</span></a><br>
                    <a class="menu-link {{ Request::is('time-sheets-display') ? 'active' : '' }}" href="time-sheets-display"><i class="fas fa-user-tie"></i><span class="icon-text"> Time Sheets</span></a><br>

                    {{-- <a class="menu-link" href="/employee-home"><i class="fas fa-home"></i><span class="icon-text"> Home</span></a><br>
                    <a class="menu-link" href="employee-pages"><i class="fas fa-user-tie"></i><span class="icon-text"> Employees</span></a><br>
                    <a class="menu-link" href="time-sheets-display"><i class="fas fa-user-tie"></i><span class="icon-text">Time Sheets</span></a><br> --}}
                    </div>
                </div>

        @endif

        <div class="col-md-10 p-0 fullContaint">
             <div class="row-header" style="z-index: 1000;">
             
            <div class="m-0 row" style="color: white; padding: 5px;">
                <div class="col-md-3 p-0 fs-4 m-auto">
                    <i class="fas fa-bars hideHamburger" style="float: left; color: #fff; font-size: 20px; margin: 0px 10px; cursor: pointer;" onclick="myMenu()"></i>
                    @livewire('page-title')
                </div>
                <div style="margin: auto; text-align: right;" class="col-md-6 p-0">@livewire('user-login-info')</div>
                <div class="col-md-3 p-0" style="text-align: right;">@livewire('log-out')</div>
            </div>
        </div>
 
            <div class="row-content">
                <div class="overflow-auto">
                    {{$slot}}
                </div>
            </div>
        </div>
    @endif
</div>


    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





    <!-- Add this script inside the head tag or at the end of the body tag -->







    <!-- Add this script inside the head tag or at the end of the body tag -->
<script>
    function myMenu() {
        document.getElementById("col-md-2").classList.toggle("displayBlock");
    }
</script>

</body>


</html>