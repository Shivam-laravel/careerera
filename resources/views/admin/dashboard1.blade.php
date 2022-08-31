@extends('auth.layouts.app')

@section('styles')
<style>
    .right_btn_area{float: right;}
    .mt-30{margin-top: 30px}
</style>
@endsection

@section('scripts')


@endsection

@section('container')
<div class="container">
    <div class="row">

        <!-- Bootstrap Daterangepicker -->

          <div class="card">
            <h5 class="card-header">See Total from date range</h5>
            <div class="card-body">
                <form action="{{ route('total') }}" method="get">
              <div class="row">

                    <div class="col-md-4 col-12 mb-4">
                        <label for="flatpickr-date" class="form-label">From</label>
                        <input type="date" name="from" class="form-control" required placeholder="YYYY-MM-DD" >
                      </div>
                      <div class="col-md-4 col-12 mb-4">
                        <label for="flatpickr-date" class="form-label">To</label>
                        <input type="date" name="to" class="form-control" required placeholder="YYYY-MM-DD" >
                      </div>

                      <div class="col-md-4 col-12 mb-4 mt-30">
                          <div class="right_btn_area">


                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>

                      </div>
                </form>


              </div>
            </div>
          </div>
        </div>
<div class="container-xxl flex-grow-1 container-p-y">
<p>You are viewing data from {{ $from }} to {{ $to }}</p>
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Total Revenue</span>
  </h4>


    <div class="col-md-12 col-lg-12">
      <div class="row">
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Base Fare</span>
              <h4 class="card-title mb-1">₹ {{ $basefare }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
            </div>
          </div>
        </div>


        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">TAX</span>
              <h4 class="card-title mb-1">₹ {{ $tax }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>

        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Convenience</span>
              <h4 class="card-title mb-1">₹ {{ $convenience }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Markup</span>
              <h4 class="card-title mb-1">₹ {{ $markup }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Discount</span>
              <h4 class="card-title mb-1">₹ {{ $discount }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Net fare</span>
              <h4 class="card-title mb-1">₹ {{ $total_fare }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Profit</span>
              <h4 class="card-title mb-1">₹ {{ $profit }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Loss</span>
              <h4 class="card-title mb-1">₹ {{ $loss }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">CGST</span>
                <h4 class="card-title mb-1">₹ {{ $cgst }}</h4>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">SGST</span>
                <h4 class="card-title mb-1">₹ {{ $sgst }}</h4>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">IGST</span>
                <h4 class="card-title mb-1">₹ {{ $igst }}</h4>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
              </div>
            </div>
          </div>

      </div>
    </div>

    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Total Manual Income</span>
    </h4>

    <div class="col-md-12 col-lg-12">
      <div class="row">
        <div class="col-lg-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span class="d-block">Amount</span>
              <h4 class="card-title mb-1">₹ {{ $amount }}</h4>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-2 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">IGST</span>
                <h4 class="card-title mb-1">₹ {{ $incomeigst }}</h4>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">CGST</span>
                <h4 class="card-title mb-1">₹ {{ $incomecgst }}</h4>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">SGST</span>
                <h4 class="card-title mb-1">₹ {{ $incomesgst }}</h4>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
              </div>
            </div>
          </div>


      </div>



  </div>
              </div>
              <!-- / Content -->
@endsection
