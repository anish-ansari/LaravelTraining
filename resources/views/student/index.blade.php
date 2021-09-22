@extends('layouts.master')
@section('content')
  <div class="container">
  <h1>Student List</h1>
  @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button"  class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

  <div class="py-3">
    <a href="{{url('students/create')}}"><button class="btn btn-primary ">Add</button></a>
  </div>
  
  <table class="table table-striped table-bordered ">
    <tr>
      <th>SN</th>
      <th>Roll No.</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
    @php $i=1 @endphp
    @if ($pages->count()>0)
      @foreach ($pages as $page)
      <tr>
      <td>{{$i++}}</td>
      {{-- <td>{{$page->id}}</td> --}}
      <td>{{$page->roll_no}}</td>
      <td>{{$page->name}}</td>
      <td>{{$page->phone}}</td>
      <td><a href="{{url('students/'.$page->id.'/edit')}}"><button class="btn btn-warning ">Edit</button></a>
        <div class="py-1"></div>
        <form action="{{ url('students',$page->id)}}" method="post">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger ">Delete</button>
       </form>
      </td>
      
      
      {{-- <td><a href="{{url('delete/'.$page->id)}}"><button class="btn btn-danger ">Delete</button></a></td> --}}
       
    </tr>
    @endforeach
    @endif
  </table>
</div>
  {{$pages->links('pagination::bootstrap-4')}}
  
@endsection