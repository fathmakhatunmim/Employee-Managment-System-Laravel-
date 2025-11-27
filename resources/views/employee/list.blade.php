<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Managment system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

   <div class="bg-primary py-3">
    <h1 class="text-white text-center">Employee list</h1>
   </div>



      <div class='container'>
            <div class="row justify-content-center mt-4">
    <div class="col-md-10 d-flex justify-content-end">
        <a href="{{ route('employee.create') }}" class="btn btn-dark">Add New</a>
    </div>
</div>





        <div class="row d-flex justify-content-center">
              @if(Session::has('success'))
    <div class="col-md-10 mt-4">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif

            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-header">
                        <h3 class= "">Employee</h3>
                    </div>
                  
                    <div class="card-body">
                        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Department</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($employee->isNotEmpty())
            @php $i = 1;
            @endphp
            @foreach($employee as $employees)
                    <td>{{ $i++ }}</td>
                    <td>{{ $employees->name }}</td>
                    <td>{{ $employees->Email }}</td> 
                    <td>{{ $employees->position }}</td>
                    <td>{{ $employees->department }}</td>
                    <td>
                        {{ optional($employees->created_at)->format('d M, Y') ?? '—' }}
                    </td>
                      
              <td>
                 <a href="{{ route('employee.edit', $employees->id) }}" class="btn btn-dark">EDIT</a>
                <a href="#" class="btn btn-danger" onclick="deleteProduct({{ $employees->id }});">DELETE</a>
               <form id="delete-employee-form-{{ $employees->id }}" action="{{ route('employee.delete', $employees->id) }}" method="POST" style="display: none;">
                @csrf
             @method('delete')
           </form>

               </td>
        
                </tr>
            @endforeach
        @else
        @endif
    </tbody>
</table>


                    </div>






                </div>
            </div>

        </div>


      </div>
    
       


  </body>
</html>

<script>
    function deleteProduct(id){
        if(confirm("Are you sure you want to delete this employee?")){
            document.getElementById("delete-employee-form-"+id).submit();
        }
    }
</script>
