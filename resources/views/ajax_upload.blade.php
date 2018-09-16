<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Image Upload using Ajax</title>
        {{-- CSS --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        {{-- jQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body><br><br>
        <div class="container">
            <h3 class="center">Upload Image in Laravel</h3>
            <div class="alert" id="message" style="display:none"></div>
            <form method="post" id="upload_form"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Select File for Upload</label>
                        <input type="file" class="form-control" id="select_file" name="select_file">
                    </div>
                </div>
                <input type="submit" id="upload" name="upload" class="btn btn-primary" value="Upload">
                <div class="form-row">
                    <div class="form-group center">
                        <span class="badge badge-warning">* Jpg, gif, png</span>
                    </div>
                </div>
            </form>
            <br>
            <span id="uploaded_image"></span>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $("#upload_form").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('ajaxupload.action') }}",
                method: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache : false,
                processData: false,
                success: function (data) {
                    $("#message").css("display", "block");
                    $("#message").html(data.message);
                    $("#message").addClass(data.class_name);
                    $("#uploaded_image").html(data.uploaded_image);
                }
            });
        });
    });
</script>