<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="p-4">
        <section  id="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Laravel Axios Crud


                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#Addmodal">
                                        Add Student
                                      </button>
                                </h2>
                                <!-- Button trigger modal -->

                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead">
                                        <tr>
                                            <th class="text-center">{{ __('Name') }}</th>
                                            <th class="text-center">{{ __('Phone') }}</th>
                                            <th class="text-center">{{ __('Address') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @if($students !=  null)


                                        @foreach ($students as $student)
                                        <tr>
                                            <td class="text-center">{{ $student->name }}</td>
                                            <td class="text-center">{{ $student->phone }}</td>
                                            <td class="text-center">{{ $student->address }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success">View</button>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>

                                            </td>
                                        </tr>

                                        @endforeach

                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--  Student add modal   --}}


        <!-- Modal -->
        <div class="modal fade" id="Addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{  __('Student Add From') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form >
                    <div class="form-group">
                        <label for="student_name">Student Name</label>
                        <input type="text" class="form-control" id="student_name" placeholder="Student Name">
                    </div>
                    <div class="form-group">
                        <label for="student_name">Student Phone</label>
                        <input type="text" class="form-control" id="student_phone" placeholder="Student phone">
                    </div>
                    <div class="form-group">
                        <label for="student_name">Student address</label>
                        <input type="text" class="form-control" id="student_address" placeholder="Student address">
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="submitStudent()" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


        <script>
            function submitStudent(){


                const student_name = $("#student_name").val();
                const student_phone = $("#student_phone").val();
                const student_address = $("#student_address").val();

                const data={
                    'name': student_name,
                    'phone': student_phone,
                    'address': student_address,
                }
                axios.post('/store', data )
                    .then((data) =>{
                        console.log();
                        if(data.status == 201 || 200){
                            $('#exampleModal').modal('hide');
                            location.reload();

                        }else{
                            alert("test")
                        }
                    })
                    .catch((error) => {
                        alert(error)
                    })

            }
        </script>
    </body>
</html>
