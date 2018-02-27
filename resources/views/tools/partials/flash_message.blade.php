@if (session('success'))
    <div class="alert alert-success">
        <center>{{ session('success') }}</center>
        <span class="pull-right">
            <a   data-dismiss="modal">
                <i class="fa fa-times"></i>
            </a>
        </span>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        <center>{{ session('error') }}</center>
        <span class="pull-right">
            <a  data-dismiss="Warning">
                <i class="fa fa-times"></i>
            </a>
        </span>
    </div>
@endif