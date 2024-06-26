<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <title>Students</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand h1" href={{ route('students.index') }}>Students CRUD</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('students.create') }}>Add Student</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid" id="popup">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
            <button onclick="document.getElementById('popup').remove()" class="close" aria-label="Close">X</button>

        </ul>
    </div>
@endif
  </div>
  <div class="container mt-5 border rounded border-dark">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student ID</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Gender</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
      <tr>
        <td>{{$loop->index +1}}</th>
        <td class="">{{ $student->id }}</td>
        <td>{{ $student->fname }}</td>
        <td>{{ $student->lname }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td> <a href="{{ route('students.edit', $student->id) }}"
            class="btn btn-primary btn-sm">Edit</a>  <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
            </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-center mt-3">
  {{ $students->links() }}
</div>
  </div>
   
</body>
</html>