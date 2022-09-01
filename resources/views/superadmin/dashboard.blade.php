@extends('superadmin.layouts.app')

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

          <div class="card" style="display: none">
            <h5 class="card-header"></h5>
            <div class="card-body">

              <div class="row">


                      <div class="col-md-4 col-12 mb-4 mt-30">
                          <div class="right_btn_area">


                    </div>


                      </div>



              </div>
            </div>
          </div>
        </div>


    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Tickets</span>
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
                <span class="d-block">Total Tickets</span>
                <h4 class="card-title mb-1">{{ count($tickets) }}</h4>
              </div>

            </div>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="card">
                <a href="{{ url('home/open-tickets') }}" style="text-decoration: none;color: black;">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="../../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                  </div>
                </div>
                <span class="d-block">Open Tickets</span>
                <h4 class="card-title mb-1">{{ $ticket['Open'] }}</h4>
              </div>
                </a>
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
                <span class="d-block">Closed Tickets</span>
                <h4 class="card-title mb-1">{{ $ticket['Closed'] }}</h4>
              </div>
            </div>
          </div>

        </div>
      </div>





@endsection
