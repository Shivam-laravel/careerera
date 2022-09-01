@extends('admin.layouts.app')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <!-- Inline text elements -->
        <div class="col">
          <div class="card mb-4">
            <h5 class="card-header">Issue ID : {{ $ticket[0]->issue_id }}</h5>
            <div class="card-body">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td class="align-middle"><small class="text-light fw-semibold">Student ID</small></td>
                    <td class="py-3">
                      <p class="mb-0"><mark>{{ $ticket[0]->student_id }}</mark></p>
                    </td>
                  </tr>
                  <tr>
                    <td><small class="text-light fw-semibold">Student Name</small></td>
                    <td class="py-3">
                      <p class="mb-0"><strong>{{ $ticket[0]->student_name }}</strong></p>
                    </td>
                  </tr>

                  <tr>
                    <td><small class="text-light fw-semibold">Query Type</small></td>
                    <td class="py-3">
                      <p class="mb-0"><small>{{ $ticket[0]->query_type }}</small></p>
                    </td>
                  </tr>
                  <tr>
                    <td><small class="text-light fw-semibold">Query Description</small></td>
                    <td class="py-3">
                      <p class="mb-0"><small>{{ $ticket[0]->description }}</small></p>
                    </td>
                  </tr>
                  <tr>
                    <td><small class="text-light fw-semibold">Status</small></td>
                    <td class="py-3">
                      <p class="mb-0"><small>{{ $ticket[0]->status }}</small></p>
                    </td>
                  </tr>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>




    <div class="card">
      <h5 class="card-header">Comments</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 p-4">
              <div class="list-group">

                @foreach ($comments as $comment)
                <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                    <div class="li-wrapper d-flex justify-content-start align-items-center">

                      <div class="list-content">
                        <small class="text-dark">{{ $comment->comment }}</small>
                      </div>
                    </div>
                    <small>{{ $comment->created_at }}</small>
                  </a>
                @endforeach


              </div><br>
              <form action="{{ route('add.comment') }}" method="post">
                @csrf
                <div class="col-md-3">
                    <label class="form-label" for="selectType">Add comment</label>
                    <input type="text" class="form-control" name="comment" required>
                    <input type="hidden" name="issue_id" value="{{ $ticket[0]->issue_id }}">
                </div><br>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>

          </div>

          <div class="col-lg-6 p-4">

              <form action="{{ route('update.status') }}" method="post">
                @csrf
                <div class="col-md-3">
                    <label class="form-label" for="selectType">Update Status</label>
                    <select id="selectType" name="status" class="form-select color-dropdown">
                      <option value="Open" selected="">Open</option>
                      <option value="Closed">Closed</option>
                    </select>
                    <input type="hidden" name="issue_id" value="{{ $ticket[0]->issue_id }}">
                  </div>
                  <br>
                  <div class="col-md-3">
                    <button type="submit" id="showToastAnimation" class="btn btn-primary d-block">Update</button>
                  </div>

              </form>



        </div>
          <!--/ Notification Style -->
        </div>
      </div>

    </div>


              </div>
@endsection
