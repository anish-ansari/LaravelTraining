<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Student List</title>
</head>
<body>
  <h1>Student List</h1>
  <table border="1">
    <tr>
      <th>SN</th>
      <th>Roll No.</th>
      <th>Name</th>
      <th>Phone</th>
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
    </tr>
    @endforeach
    @endif
  </table>
  {{$pages->links()}}
</body>
</html>