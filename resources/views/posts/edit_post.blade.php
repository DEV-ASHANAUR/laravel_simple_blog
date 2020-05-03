@extends('welcome')
@section('header')
  <header class="masthead" style="background-image: url({{ asset('fontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Edit Post</h1>
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
        <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" name="title" value="{{ $post->title}}">
            </div>
          </div>
          <br>
          <div class="control-group">
            <div>
              <label>Select Category</label>
              <select name="category_id" name="category_id" id="" class="form-control">
                  @foreach($category as $row)
                  <option value="{{ $row->id}}" <?php if($row->id == $post->category_id){echo 'selected';} ?>>{{$row->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>image</label>
              <input type="file" name="image" class="form-control">
              <img src="{{ url($post->image)}}" class="img-fluid" height="70px" width="70px" alt="">
              <input type="hidden" name="old_image" value="{{ $post->image}}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" name="details" class="form-control" placeholder="Post Details">{{ $post->details}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
@endsection