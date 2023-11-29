<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        .login-form-with-shadow {
            width: 80%;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-form-with-shadow input {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            box-sizing: border-box;
        }

        .login-form-with-shadow button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form-with-shadow button:hover {
            background-color: #0056b3;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .text-danger {
            font-size: 12px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .login-form-with-shadow {
                width: 90%;
            }
        }
    </style>

    <body>
        <div class="container-fluid p-0">
            <div class="row m-0" style="padding: 5%;">
                <!-- Left Side (Login Form) -->
                <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
                    <div class="logo text-center mb-4"></div>
                    @if (Session::has('success'))
                    <div class="logo text-center mb-4">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (session('sessionExpired'))
                    <div class="alert alert-danger">
                        {{ session('sessionExpired') }}
                    </div>
                    @endif
                    <form wire:submit.prevent="empLogin" class="login-form-with-shadow">
                        <div class="logo text-center mb-1" style="padding-top: 20px;">
                            <img src="{{asset('/images/CMSLogo.png')}}" alt="Company Logo" width="200" height="100">
                        </div>
                        <br>
                        @if ($error)
                        <div style="font-size: 12px;text-align: center;" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                        @endif
                        <div class="form-group">
                            <input style="font-size: 12px;" type="text" class="form-control" placeholder="ID/Email" wire:model="form.id" />
                            @error('form.id')
                            <p class="pt-2 px-1 text-danger">{{ str_replace('form.id', 'ID or Email', $message) }}</p>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-top: 20px;">
                            <input style="font-size: 12px;" type="password" class="form-control" placeholder="Password" wire:model="form.password" />
                            @error('form.password')
                            <p class="pt-2 px-1 text-danger">{{ str_replace('form.password', 'Password', $message) }}</p>
                            @enderror
                        </div>

                        <div class="form-group" style="text-align: center; margin-top: 8%;">
                            <input style="background-color: rgb(2, 17, 79); font-size: small; width: 25%;" type="submit" class="btn btn-primary" value="Login" />
                        </div>
                    </form>
                </div>
                <!-- Right Side (Carousel) -->
                <div class="col-md-6">
                    <!-- Carousel -->
                    <div id="demo" class="carousel slide" data-bs-ride="carousel" style="background-color: #f0f0f0; border-radius: 10px;">
                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>
                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img style="border-radius: 5px;" src="{{ asset('/images/Home Images-01.png') }}" class="d-block w-100" alt="Los Angeles">
                                <div class="carousel-caption" style="bottom: 0px; padding-bottom: 0px; color: #007bff;"></div>
                            </div>
                            <div class="carousel-item">
                                <img style="border-radius: 5px;" src="{{ asset('/images/Home Images-02.png') }}" class="d-block w-100" alt="Chicago">
                                <div class="carousel-caption" style="bottom: 0px; padding-bottom: 0px; color: #007bff;"></div>
                            </div>
                            <div class="carousel-item">
                                <img style="border-radius: 5px;" src="{{ asset('/images/Home Images-03.png') }}" class="d-block w-100" alt="New York">
                                <div class="carousel-caption" style="bottom: 0px; padding-bottom: 0px; color: #007bff;"></div>
                            </div>
                        </div>
                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @livewireStyles
    </body>

    </html>
</div>

</div>