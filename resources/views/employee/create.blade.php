<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Managment system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

   <div class="bg-success py-3">
    <h1 class="text-white text-center">Employee Information</h1>
   </div>



      <div class='container'>

             <div class="row justify-content-center mt-4">
    <div class="col-md-10 d-flex justify-content-end">
        <a href="{{ route('employee.index') }}" class="btn  text-white bg-primary">Back</a>
    </div>
</div>

        <div class="row d-flex justify-content-center">
          <div class="col-md-10">
                <div class="card border-0 shadow-lg my-5">
                   <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h3 class= "">CREATE</h3>
                    </div>
        
                   <form action="{{ route('employee.store') }}" method="post">
    @csrf

    <div class="card-body">

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" 
                   name="name" 
                   id="name"
                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" 
                   placeholder="Name">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" 
                   placeholder="Email">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Position -->
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" 
                   name="position" 
                   id="position" 
                   class="form-control form-control-lg @error('position') is-invalid @enderror" 
                   value="{{ old('position') }}" 
                   placeholder="Position">
            @error('position')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Department -->
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" 
                   name="department" 
                   id="department" 
                   class="form-control form-control-lg @error('department') is-invalid @enderror" 
                   value="{{ old('department') }}" 
                   placeholder="Department">
            @error('department')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-grid">
            <button class="btn btn-lg btn-primary">SUBMIT</button>
        </div>

    </div>
</form>

                </div>
            </div>

        </div>


      </div>
    



  </body>
</html>