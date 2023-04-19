</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">HRS</a>.</strong>
    All rights reserved.
</footer>
</div><!-- jQuery -->
<script src="{{ asset('frequently-changing/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('frequently-changing/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('frequently-changing/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('frequently-changing/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('frequently-changing/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('frequently-changing/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('frequently-changing/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('frequently-changing/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('frequently-changing/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('frequently-changing/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('frequently-changing/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('frequently-changing/plugins/admin-lte/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('frequently-changing/plugins/admin-lte/demo.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('frequently-changing/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- jquery-validation -->
@include('backend.layout.validation-script')
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('frequently-changing/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('frequently-changing/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('frequently-changing/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('frequently-changing/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('frequently-changing/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('frequently-changing/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('frequently-changing/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('frequently-changing/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('frequently-changing/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script>

</script>
<!-- DataTables  & Plugins -->
@include('backend.layout.data-table-script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('.select2').select2();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

<!-- Add Custom Script -->
@stack('js')
</body>
</html>

