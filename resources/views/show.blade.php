<!DOCTYPE html>
<html>
<head>
	<title>Link Redirect Failed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
</head>
<body>
<div>
   
    <div class="row">
        <div class="col-sm-10">
            <div class="alert alert-warning">
                Failed : {{$message}}
            </div>
  
        </div>
    </div>    
</div>



</body>
</html>