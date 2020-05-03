@extends('welcome')
@section('header')
  <header class="masthead" style="background-image: url({{ asset('fontend/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>View Post</h1>
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
        <hr>
            <h3>{{ $post->title}}</h3>
            <img src="{{ url($post->image)}}" height="340px" alt="">
            <h4 class="mt-2">{{ $post->name}}</h4>
            <p>{{ $post->details}}</p>
      </div>
    </div>
@endsection