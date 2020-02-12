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
       
        <a href="{{ route('category.create') }}" class="btn btn-danger">Add Category</a>
       
      <hr>
      <table class="table table-responsive">
        <tr>
          <th>Category Name</th>
          <th>Action</th>
        </tr>
        @foreach($category as $row)
        <tr>
          <td>{{ $row->name }}</td>
          <td>
            <a href="{{ URL::to('/category/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
            <a href="{{ URL::to('/category/delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
          </td>
        </tr>
        @endforeach
      </table>
       
     </div>
   </div>
</div>
@endsection
