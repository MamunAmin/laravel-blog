@extends('extendFrom')

@section('header')
<header class="masthead" style="background-image: url({{ asset('blog/img/home-bg.jpg')}})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Feel Your Earth</h1>
          <span class="subheading">For Discovering Every Corner of This Earth!!</span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    @foreach($post as $row)
      <div class="post-preview">
        <img src="{{$row->image}}" style="height: 300px; width: 600px">
        <a href="{{url('detailsPost/'.$row->id)}}">
          <h2 class="post-title">
            {{$row->title}}
          </h2>
          <h3 class="post-subtitle">
            {{$row->name}}
          </h3>
        </a>

      </div>
      <hr>
    @endforeach        
<!-- Pager -->
    <div class="clearfix">
      {{$post->links()}}
    </div>
  </div>
</div>  
@endsection
