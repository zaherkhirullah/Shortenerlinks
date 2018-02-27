$(document).ready(function() {
    $('#DataTable').DataTable( 
    {
    "order": [[ 3, "desc" ]],
    "scrollY":        "",
    "scrollCollapse": false,
    "paging":         true
    });
    new Clipboard('.btn-copy');
    
    $('.DataTable').DataTable( 
        {
        "scrollY":        "",
        "scrollCollapse": true,
        "paging":         true
        });
});