<!-- resources/views/livewire/vendor-list.blade.php -->

<div>
    <style>
        /* Your existing styles remain the same */

        .card {
            margin-bottom: 15px;
            position: relative;
            height: 450px;
            line-height: 1;
            margin-top: 40px;
        }

        .pink-background {
            position: absolute;
            bottom: 0;
            left: 0;
            font-weight: 600;
            width: 100%;
            color: #fff;
            font-size: 0.785rem;
            background-color: #003767;
            text-align: center;
            padding: 15px 30px;
        }

        .card-img-top {
            margin-top: 20px;
            border-radius: 50%;
            border: 4px solid #003767; /* Blue border color */
            overflow: hidden;
        }

        .card-body {
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .card-content {
            font-size: 0.785rem;
            font-weight: 500;
            color: #778899;
            display: flex;
            justify-content: space-between;
        }

        .search-box {
            width: 200px; /* Adjust the width as needed */
            margin-bottom: 20px;
        }

        .view-options {
            position: absolute;
            top: 80px;
            right: 15px;
            width: 100px; /* Adjust the width as needed */
            display: flex;
            justify-content: flex-end;
        }

        /* Add more styles as needed */
    </style>

    <div class="container" style="padding: 10px 15px; margin: 30px auto; background:#fff;">
        <h3>Our Vendors</h3>

        <!-- Search Box -->
        <div class="search-box">
            <input type="text" wire:model="search" placeholder="Search vendors...">
        </div>

        <!-- View Options (Grid/Normal) -->
        <div class="view-options">
            <label for="view-select">View </label>
            <select wire:model="view" id="view-select">
                <option value="grid">Grid</option>
                <option value="normal">Normal</option>
            </select>
        </div>

        @foreach ($vendors as $vendor)
            <div class="col-md-3">
                <div class="card @if($view === 'grid') grid-view @endif">
                    <img src="{{ $vendor->vendor_image }}" class="card-img-top" alt="Vendor Image" style="width:150px;height:150px;">
                    <div class="card-body">
                        <div class="card-mid">
                            <p class="card-content"><strong>Vendor Email :</strong> {{ $vendor->email }}</p>
                            <p class="card-content"><strong>Contract Value :</strong> {{ $vendor->contract_value }}</p>
                            <p class="card-content"><strong>Vendor Payment Terms :</strong> {{ $vendor->payment_terms }}</p>
                            <p class="card-content"><strong>Contract Start Date :</strong> {{ $vendor->contract_start_date }}</p>
                            <p class="card-content"><strong>Contract End Date :</strong> {{ $vendor->contract_end_date }}</p>
                        </div>
                        <div class="pink-background">{{ $vendor->vendor_name }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
