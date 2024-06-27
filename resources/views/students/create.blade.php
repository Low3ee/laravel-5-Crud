<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Create Student</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
          <a class="navbar-brand h1" href={{ route('students.index') }}>CRUDPosts</a>
          <div class="justify-end ">
            <div class="col ">
              <a class="btn btn-sm btn-success" href={{ route('students.create') }}>Add Student</a>
            </div>
          </div>
        </div>
      </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Add a Post</h3>
            <form action="{{ route('students.store') }}" method="POST">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
              </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select class="form-control" name="gender" id="gender">
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">LGBTQ+</option>
                      <option value="4">Prefer Not To Say</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              <div class="form-group">
                <label for="email">First Name</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Create Student</button>
            </form>
          </div>
        </div>
      </div>
    
</body>
</html>
