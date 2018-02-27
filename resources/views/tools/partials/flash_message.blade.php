@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <center> 
            <strong>Success!</strong> {{ session('success') }}
        </center>
     </div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <center>  
             <strong>Error!</strong> {{ session('error') }}
        </center>
     </div>
    </div>
@endif