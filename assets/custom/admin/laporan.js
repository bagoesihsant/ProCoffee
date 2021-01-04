$('#dataTableLaporan').DataTable({
    "responsive": true,
    "autoWidth": false,
});


function deleteLaporan(url){
    $('#btn-delete').attr('href', url);
    $('#hapusLaporan').modal();
    }
