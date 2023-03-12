<!-- https://www.webslesson.info/2020/08/php-crop-image-while-uploading-with-cropper-js.html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->

    <title>User Profile Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <style>
        .image_area {
            position: relative;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        .overlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: .5s ease;
            width: 100%;
        }

        .image_area:hover .overlay {
            height: 50%;
            cursor: pointer;
        }

        .text {
            color: #333;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        
        .btn {
            padding: 5px 10px;
            border-radius: 5px;
            background: cornflowerblue;
            color: white;
        }
        .btn:hover {
            border: 1px solid blue !important;
        }
        
    </style>
</head>

<body>
    <div class="container" align="center">
        <a href="{{ url('/') }}" class="btn text-sm text-gray-700 dark:text-gray-500 underline">Home</a>

        <br />
        <h3 align="center">Crop Image Before Upload using CropperJS with PHP</h3>
        <br />

        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <form method="post">
                    <div class="row">
                        <div class="col-md-8">

                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" placeholder="Name" class="form-control mb-3">
                            <br>
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" placeholder="Email" class="form-control mb-3">
                        </div>
                        <div class="col-md-4">

                            <div class="image_area">
                                <label for="upload_image">

                                    <img src="{{ $user->profile_image }}" id="uploaded_image" class="img-responsive img-circle" />
                                    <div class="overlay">
                                        <div class="text">Click to Change Profile Image</div>
                                        @csrf()
                                    </div>
                                    <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="button" id="formSubmit">Submit</button>
                </form>
            </div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="container">
        <label for="name">Name %{name}%</label>
        <input type="text" name="searchName" placeholder="Name" class="form-control mb-3">
        <br>
        <label for="email">Email</label>
        <input type="text" name="searchEmail" placeholder="Email" class="form-control mb-3">
        <br>
        <button type="button" id="searchBtn">search</button>

        <br>
        <label for="users">Users Search Result</label>
        <ul id="users">

        </ul>
    </section>
</body>

</html>

<script>
    $(document).ready(function() {

        var $modal = $('#modal');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#upload_image').change(function(event) {
            var files = event.target.files;

            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $('#uploaded_image').attr('src', base64data);
                };
            });
        });

        $('#formSubmit').click(function() {

            var inputName = $('input[name="name"]');
            var inputEmail = $('input[name="email"]');
            var base64data = $('#uploaded_image').attr('src');

            REGEX_VALIDATE = true;
            $('input').css('border', '');

            emailREGEX = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            nameREGEX = /^[A-Za-z]+$/;

            if (!nameREGEX.test(inputName.val())) {
                REGEX_VALIDATE = false;
                inputName.css("border", "1px solid red");
                console.log('nameREGEX Failed');
            }
            if (!emailREGEX.test(inputEmail.val())) {
                REGEX_VALIDATE = false;
                inputEmail.css("border", "1px solid red");
                console.log("emailREGEX Failed");
            }

            if (REGEX_VALIDATE) {
                $.ajax({
                    url: '{{ route("user.profile_update") }}',
                    method: 'POST',
                    dataType: "json",
                    data: {
                        _token: $('input[name="_token"]').val(),
                        name: inputName.val(),
                        email: inputEmail.val(),
                        image: base64data
                    },
                    success: function(data) {
                        res = data.data;
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', res.profile_image);
                    }
                });
            }

        });

        $('#searchBtn').click(function() {
            $.ajax({
                url: '{{ route("user.search") }}',
                method: 'GET',
                dataType: "json",
                data: {
                    // _token: $('input[name="_token"]').val(),
                    name: $('input[name="searchName"]').val(),
                    email: $('input[name="searchEmail"]').val()
                },
                success: function(data) {
                    $('ul#users').html('')
                    users = data.data;
                    users.map(function(user){
                        console.log(user.name);
                        $('ul#users').append(`<li>${user.name}</li>`);
                    })
                }
            });
        });
    });
</script>