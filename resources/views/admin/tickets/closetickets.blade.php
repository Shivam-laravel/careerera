@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('scripts')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">

    @if(Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
    </div>
    @endif
    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Closed Tickets</span>
    </h4>
    {{-- <a href="{{ url('home/articles/manage_articles') }}"><button type="button" class="btn btn-success">Add articles</button></a><br> --}}
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Closed Tickets</h5>
      <div>
        <table id="table_id" class="table">
          <thead>
            <tr>
              <th>Issue Id</th>
              <th>Student Name</th>
              <th>Batch</th>
              <th>Query type</th>
              <th>Status</th>
              <th>DateTime</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($queries as $in)
            <tr>
                <td><a class="btn btn-danger" href="{{ url('home/tickets') }}/{{ $in->issue_id }}">{{ $in->issue_id }}</a></td>
                <td>{{ $in->student_name }}</td>
                <td>{{ $in->batch_id }}</td>
                <td>{{ $in->query_type }}</td>
                <td>{{ $in->status }}</td>
                <td>{{ $in->created_at }}</td>
                {{-- <td>
                  <a href="{{ url('home/articles/manage_blogs') }}/{{ $in->id }}"><button type="button" class="btn rounded-pill btn-info">Edit</button></a>
                  <a href="{{ url('home/articles/delete') }}/{{ $in->id }}"><button type="button" class="btn rounded-pill btn-danger">Delete</button></a>
                </td> --}}
              </tr>
            @endforeach



          </tbody>
        </table>
      </div>
    </div>
              </div>
              <!-- / Content -->
@endsection
