@extends('welcome')
@section('header')
  <header class="masthead" style="background-image: url({{ asset('fontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Write Post</h1>
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
        <a href="{{ route('all.post')}}" class="btn btn-info">All Post</a>
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
        <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" name="title" placeholder="Post Title">
            </div>
          </div>
          <br>
          <div class="control-group">
            <div>
              <label>Select Category</label>
              <select name="category_id" name="category_id" id="" class="form-control">
                  @foreach($category as $row)
                  <option value="{{ $row->id}}">{{$row->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>image</label>
              <input type="file" name="image" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" name="details" class="form-control" placeholder="Post Details"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Post</button>
          </div>
        </form>
      </div>
    </div>
@endsection