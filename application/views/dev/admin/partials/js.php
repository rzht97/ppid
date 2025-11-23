<!-- jQuery 3.7.1 (SECURITY UPDATE: Fixed CVE-2015-9251, CVE-2019-11358, CVE-2020-11022, CVE-2020-11023) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>inverse/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url()?>inverse/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url()?>inverse/js/jquery.slimscroll.js"></script>
	<!-- Magnific popup JavaScript -->
    <script src="<?= base_url()?>inverse/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url()?>inverse/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url()?>inverse/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()?>inverse/js/custom.min.js"></script>
    <script src="<?= base_url()?>inverse/js/jasny-bootstrap.js"></script>
    <script src="<?= base_url()?>inverse/js/validator.js"></script>
    <!-- DataTables 1.13.8 (SECURITY UPDATE: Updated from vulnerable 1.10.10) -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons Extension (Updated to 2.4.2) -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.flash.min.js"></script>
    <!-- Export dependencies (Updated versions) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.2.7/build/pdfmake.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.2.7/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <!--Style Switcher -->
    <script src="<?= base_url()?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>