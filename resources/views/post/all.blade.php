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
     <div class="col-lg-12  mx-auto">
        <a href="{{ route('post.create') }}" class="btn btn-info">Write Post</a>
       
      <hr>
      <table class="table table-responsive">
        <tr>
          <th>Category</th>
          <th>Title </th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        @foreach($post as $row)
        <tr>
          <td>{{ $row->name }}</td>
          <td>{{ $row->title }}</td>
          <td><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;"></td>
          <td>
            <a href="{{ URL::to('post/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
            <a href="{{ URL::to('post/delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
            <a href="{{ URL::to('post/view/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
          </td>
        </tr>
        @endforeach
      </table>
       
     </div>
   </div>
</div>
@endsection
