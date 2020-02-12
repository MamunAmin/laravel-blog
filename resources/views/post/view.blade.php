@extends('extendFrom')

@section('header')
<header class="masthead">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-header">
            <h1 style="height: 55px"></h1>
          </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
<div class="container">
   <div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
      <div>
           <h3>{{ $post->title }}</h3>
           <img src="{{ URL::to($post->image) }}" height="340px;" width="700px;">
           <p>Category : {{ $post->name }} </p>
           <p style="text-align: justify;">{{ $post->details }}</p>
      </div>
     </div>
   </div>
</div>
@endsection
