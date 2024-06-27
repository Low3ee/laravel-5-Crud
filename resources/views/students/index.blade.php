<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
  <title>Students</title>

  <script>
     $(document).ready(() => {
        $.ajax({
            type: 'GET',
            url: '{{ route('students.ajaxrq') }}',
            success: (data) => {
                const students = data.data;
                console.log(students);

                let table = $('#student_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    ajax: '{{ route('students.ajaxrq') }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'fname', name: 'fname' },
                        { data: 'lname', name: 'lname' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'gender_d', name: 'gender' },
                        {
        data: 'id',
        render: function (data, type, row) {
          const editLink = `<a href="/students/`+data+`/edit"
                                              class="btn btn-primary btn-sm">Edit</a>`;

                            const deleteForm = `<form action="/students/delete/`+ data +`" method="POST" class="d-inline">
                                                  {{ csrf_field() }} {{ method_field('DELETE') }}
                                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                              </form>`;

            return editLink + ' ' + deleteForm;
        }
    }
                    ]
                });

            }
        });
    });
  </script>
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
  <table class="table table-striped" id="student_table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Gender</th>
      </tr>
    </thead>
  </table>
</div>
<div class="d-flex justify-content-center mt-3">
  {{ $students->links() }}
</div>
  </div>
   
{{-- 
  eloquent display

</body>
</html>

<tbody>
  @foreach ($students as $student)
<tr>
  <td>{{$loop->index +1}}</th>
  <td class="">{{ $student->id }}</td>
  <td>{{ $student->fname }}</td>
  <td>{{ $student->lname }}</td>
  <td>{{ $student->gender_d }}</td>
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
</tbody> --}}