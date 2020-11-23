<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width">
   <title>Cloudinary Image Upload</title>
   <meta name="description" content="Prego is a project management app built for learning purposes">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Colasicas
            </div>
            <div class="col-md-6">
                <img src={{$datos}} alt="imagen">
            </div>
        </div>
    </div>
</body>
</html>