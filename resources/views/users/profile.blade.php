<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="container pt-5">
    <h1>Test Assignment!</h1>

    <form action="">
        @csrf()

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control" id="floatingInputGroup1" placeholder="Name">
                                <label for="floatingInputGroup1">Name</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <div class="form-floating">
                                <input type="text" name="email" class="form-control" id="floatingInputGroup1" placeholder="Email">
                                <label for="floatingInputGroup1">Email</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Profile Image</label>
                            <input class="form-control" type="file" id="profileImage">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Educations</h2>
                        <button class="btn btn-primary" id="addMore">Add More</button>
                    </div>
                    <div class="card-body" id="education_list">
                        
                        
                        <div class="edu-list row bg-dark pt-3 mb-1 rounded">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input type="text" name="institute_name" class="form-control" id="floatingInputGroup1" placeholder="Username">
                                        <label for="floatingInputGroup1">Institute Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input type="text" name="grade" class="form-control" id="floatingInputGroup1" placeholder="Username">
                                        <label for="floatingInputGroup1">Grade</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input type="text" name="passing_year" class="form-control" id="floatingInputGroup1" placeholder="Username">
                                        <label for="floatingInputGroup1">Passing year</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger">X</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="mt-3 w-100 btn btn-primary" id="saveData">Save</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#saveData').click(function(){
                console.log('action perform here!');
            });
        });
    
    </script>

</body>

</html>