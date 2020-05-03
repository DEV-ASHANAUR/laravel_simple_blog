@extends('welcome')
@section('header')
  <header class="masthead" style="background-image: url({{ asset('fontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>View Category</h1>
            <span class="subheading">What About Your Mind..</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection
@section('contend')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('add.category')}}" class="btn btn-danger">Add Category</a>
        <a href="{{ route('all.category')}}" class="btn btn-info">All Category</a>
        <hr>
        <ol>
            <li>Category Name : {{ $cat->name}}</li>
            <li>Slug Name : {{ $cat->slug}}</li>
            <li>Created At : {{ $cat->created_at}}</li>
        </ol>
      </div>
    </div>
@endsection