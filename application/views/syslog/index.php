<?php
/*
 * File: search.php
 * Purpose: Displays the search page for Eventlogs
 * 
 */
$resultsCount = count($results['hits']['hits']);
?>
<!--Main content -->
<section class = "content">
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-striped table-hover dataTable nowrap" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th>Time</th>
                                    <th>Hostname</th>
                                    <th>Message</th>
                                    <th>Source</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < $resultsCount; $i++) {
                                    echo '<tr role="row">';
                                    echo '<td>' . date("Y-m-d H:i:s", strtotime($results['hits']['hits'][$i]['_source']['@timestamp'])) . '</td>';
                                    echo '<td>' . $results['hits']['hits'][$i]['_source']['beat']['hostname'] . '</td>';
                                    echo '<td>' . $results['hits']['hits'][$i]['_source']['message'] . '</td>';
                                    echo '<td>' . $results['hits']['hits'][$i]['_source']['source'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Time</th>
                                    <th>Hostname</th>
                                    <th>Message</th>
                                    <th>Source</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!--Default box -->