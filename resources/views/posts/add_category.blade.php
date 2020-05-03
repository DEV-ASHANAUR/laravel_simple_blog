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
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('all.category')}}" class="btn btn-info">All Category</a>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('store.category')}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" name="name" placeholder="Catageroy Name">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" name="slug" placeholder="Slug Name">
            </div>
          </div>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
@endsection