@extends('welcome')
@section('header')
<header class="masthead" style="background-image: url({{ asset('fontend/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection
@section('contend')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($post as $row)
        <div class="post-preview">
          <a href="{{ URL::to('view/post/'.$row->id )}}">
            <img src="{{url($row->image)}}" height="300px" alt="">
            <h2 class="post-title">
              {{$row->title}}
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        <hr>
        @endforeach
        
        <!-- Pager -->
        <div class="clearfix">
          <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
          {{$post->links()}}
        </div>
      </div>
    </div>
@endsection