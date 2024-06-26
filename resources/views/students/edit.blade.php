<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Student</title>
</head>
<body>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Update student</h3>
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname"
                  value="{{ $student->fname }}" required>
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname"
                  value="{{ $student->lname }}" required>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                  value="{{ $student->phone }}" required>
              </div>
              <div class="form-group">
                <label for="email">First Name</label>
                <input type="text" class="form-control" id="email" name="email"
                  value="{{ $student->email }}" required>
              </div>
              <button type="submit" class="btn mt-3 btn-primary">Update Student</button>
            </form>
          </div>
        </div>
      </div>
    
</body>
</html>

