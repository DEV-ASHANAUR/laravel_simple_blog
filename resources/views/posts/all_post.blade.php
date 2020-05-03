@extends('welcome')
@section('header')
  <header class="masthead" style="background-image: url({{ asset('fontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Add Category</h1>
            <span class="subheading">What About Your Mind..</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection
@section('contend')
<div class="row">
      <div class="col-lg-10 col-md-12 mx-auto">
        <a href="{{ route('writepost')}}" class="btn btn-danger">Write Post</a>
        <hr>
        <table class="table table-responsive">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Title</th>
              <th>Category</th>
              <th>Image</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($post as $row)
          <tr>
              <td>{{ $row->id}}</td>
              <td>{{ $row->title}}</td>
              <td>{{ $row->name}}</td>
              <td><img src="{{ url($row->image)}}" class="img-fluid" height="70px" width="70px" alt=""></td>
              <td>
              <a href="{{ URL::to('edit/post/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
            
              
              <a href="{{ URL::to('view/post/'.$row->id )}}" class="btn btn-sm btn-success">View</a>
              
            
                <a onclick="javascript:return confirm('Are You Sure!');" href="{{ URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection