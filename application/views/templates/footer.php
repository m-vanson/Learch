<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *  _                            _     
 * | |                          | |    
 * | |      ____ ____  ____ ____| | _  
 * | |     / _  ) _  |/ ___) ___) || \ 
 * | |____( (/ ( ( | | |  ( (___| | | |
 * |_______)____)_||_|_|   \____)_| |_|                                                              
 *
 * Search application for Elastic eventlogs, syslogs etc.
 *
 * Created by:
 * Solved-IT (www.solvedit.nu)
 * 
 * Displays the footer
 * 
 */
?>
</section><!-- close section from pagehead -->
</div><!-- close div from header -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.01 Alpha
    </div>
    <strong>Copyright © 2019 <a href="https://www.solvedit.nu">Solved IT</a>, We solve your IT challenges.</strong> All rights reserved.
</footer>
</div>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/plug-ins/1.10.19/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/statistics/chartShards.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#eventlog').DataTable({
            'paging': true,
            'lengthChange': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'searchHighlight': true,
            'stateSave': true,
            responsive: [{
                    details: [{
                            type: 'column',
                            target: 'tr'
                        }]
                }],
            columnDefs: [{
                    className: 'control',
                    orderable: false,
                    targets: 0
                }],
        })
    })
</script>

</body>
</html>