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

        <a href="{{ route('category.all')}}" class="btn btn-info">All Category</a>
       
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
       <form action="{{ url('category/update/'.$category->id)}}" method="post">
        @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Category Name</label>
             <input type="text" class="form-control" value="{{$category->name}}" name="name"  >
           </div>
         </div>
         <br>
         <div class="form-group">
           <button type="Add" class="btn btn-success" >Update</button>
         </div>
       </form>
       
        
     </div>
   </div>
</div>
@endsection
