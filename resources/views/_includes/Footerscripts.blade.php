
<!-- application -->
<script src="{{ asset('styles/member/js/application.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/css/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/css/dist/js/pages/dashboard.js') }}"></script>

<!-- Data Copy --> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script> -->

<!-- Data Table --> 
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>

<script type="text/javascript"> 

	$(document).ready(function() {
        $('#DataTable').DataTable( 
		{
        "order": [[ 3, "desc" ]],
        "scrollY":        "",
        "scrollCollapse": false,
        "paging":         true
        });
        new Clipboard('.btn-copy');
} );
    </script>
    <script type="text/javascript"> 

        $(document).ready(function() {
            $('.DataTable').DataTable( 
            {
            "scrollY":        "",
            "scrollCollapse": true,
            "paging":         true
            });
            new Clipboard('.btn-copy');
    } );
        </script>
    