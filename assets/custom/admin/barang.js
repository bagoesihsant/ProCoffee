// Mengubah tabel item di item menjadi data tables
$('#dataTableItems').DataTable({
    "responsive": true,
    "autoWidth": false,
});

function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#hapusModal').modal();
    }