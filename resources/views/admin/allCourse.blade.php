@extends('layouts.adminLayout')

@section('title')
All Courses
@endsection


@section('content')
<h1 class="page-title">Creative Section</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        {{ $courses->links() }}
        <table id="order-listing" class="table table-striped"  style="width:100%;">
          <thead>
            <tr>
                <th>Course</th>
                <th>Details</th>
                <th>Fee</th>
                <th>Projects</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ Str::limit($course->details, 20) }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->projects }}</td>
                    {{-- <td><img src="{{ asset($studentImage) }}" alt="img" width="50px"></td> --}}
                    <td>
                    <a href="{{ route('course.details', ['id' => $course->id]) }}" class="btn btn-primary"> view</a>
                    <a href="{{ route('course.update', ['id' => $course->id])}}" class="btn btn-warning"> Edit</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $course->id }}">Delete</a>
                    </td>
                </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
@foreach ($courses as $course)
<div class="modal fade" id="deleteModal-{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $course->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-{{ $course->id }}">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this course?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('course.delete', ['id' => $course->id]) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection








{{-- <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"> Delete</a> --}}
{{-- @foreach ($courses as $course)
<div class="modal fade" id="deleteModal-{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this course?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{ route('course.delete', ['id' => $course->id]) }}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
</div>
@endforeach --}}

{{-- <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure delete this data !
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{ url('delete/student').$allCourse->id }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div>
  </div> --}}

