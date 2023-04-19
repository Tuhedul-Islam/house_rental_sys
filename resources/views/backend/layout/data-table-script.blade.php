<!-- DataTables  & Plugins -->
<script src="{{ asset('frequently-changing/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- datatable script -->
<script>
    $(function () {
        $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');;
    });
</script>
