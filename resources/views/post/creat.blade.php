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
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="post-preview">
      <a href="post.html">
        <h2 class="post-title">
          Man must explore, and this is exploration at its greatest
        </h2>
        <h3 class="post-subtitle">
          Problems look mighty small from 150 miles up
        </h3>
      </a>
      <p class="post-meta">Posted by
        <a href="#">Start Bootstrap</a>
        on September 24, 2019</p>
    </div>
    <hr>
    <div class="post-preview">
      <a href="post.html">
        <h2 class="post-title">
          Failure is not an option
        </h2>
        <h3 class="post-subtitle">
          Many say exploration is part of our destiny, but it’s actually our duty to future generations.
        </h3>
      </a>
      <p class="post-meta">Posted by
        <a href="#">Start Bootstrap</a>
        on July 8, 2019</p>
    </div>
    <hr>
    <!-- Pager -->
    <div class="clearfix">
      <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
    </div>
  </div>
</div>
@endsection
