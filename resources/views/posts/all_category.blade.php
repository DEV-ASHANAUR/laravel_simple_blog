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
        <a href="{{ route('add.category')}}" class="btn btn-danger">Add Category</a>
        <hr>
        <table class="table table-responsive">
          <thead>
            <tr>
              <th>Sl</th>
              <th>name</th>
              <th>Slug</th>
              <th>Created_at</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($category as $row)
          <tr>
              <td>{{ $row->id}}</td>
              <td>{{ $row->name}}</td>
              <td>{{ $row->slug}}</td>
              <td>{{ $row->created_at}}</td>
              <td>
                <a href="{{ URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
              
              
                <a href="{{ URL::to('view/category/'.$row->id )}}" class="btn btn-sm btn-success">View</a>
              
            
                <a onclick="javascript:return confirm('Are You Sure!');" href="{{ URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection