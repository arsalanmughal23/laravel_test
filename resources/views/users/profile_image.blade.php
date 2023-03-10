<!-- https://phpflow.com/php/image-uploadcrop-and-resizing-using-php-and-ajax/ -->

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

            <div class="col-md-12">
                <input type="text" name="name" class="form-control" id="floatingInputGroup1" placeholder="Name">
                <label for="floatingInputGroup1">Name</label>
            </div>

            <div class="col-sm-2">
                <img class="img-circle" id="avatar-edit-img" height="128" data-src="{{ asset('assets/img/download.png') }}" data-holder-rendered="true" style="width: 140px; height: 140px;" src="{{ asset('assets/img/download.png') }}">
            </div>
            <div class="col-sm-10">
                <a type="button" class="btn btn-primary" id="change-pic">Change Image</a>
            </div>

        </div>

        <button type="button" class="mt-3 btn btn-primary" id="saveData">Save</button>
    </form>

    <div id="changePic" class="" style="display:none">
        <form id="cropimage" method="post" enctype="multipart/form-data" action="profile.php">
            <label>Upload your image</label><input type="file" name="photoimg" id="photoimg">
            <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1">
            <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="">
            <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="">
            <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis">
            <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis">
            <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="">
            <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="">
            <input type="hidden" name="action" value="" id="action">
            <input type="hidden" name="image_name" value="" id="image_name">

            <div id="preview-avatar-profile">
            </div>
            <div id="thumbs" style="padding:5px; width:600p"></div>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btn-crop" class="btn btn-primary">Crop & Save</button>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="dist/jquery.imgareaselect.js" type="text/javascript"></script>
    <script src="dist/jquery.form.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#saveData').click(function() {
                console.log('action perform here!');


            });

            $('#change-pic').on('click', function(e){
                e.preventDefault();
                
                $('#changePic').show();
                $('#change-pic').hide();
                
            });

            $('#photoimg').on('change', function() { 
                $("#preview-avatar-profile").html('');
                $("#preview-avatar-profile").html('Uploading....');
                $("#cropimage").ajaxForm(
                {
                    target: '#preview-avatar-profile',
                    success:    function() { 
                        $('img#photo').imgAreaSelect({
                            aspectRatio: '1:1',
                            onSelectEnd: getSizes,
                        });
                    }
                }).submit();
            });
        });
    </script>

</body>

</html>