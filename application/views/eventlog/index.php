<?php
/*
 * File: search.php
 * Purpose: Displays the search page for Eventlogs
 * 
 */

$resultsCount = count($results['hits']['hits']);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
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
                                        <th>Level</th>
                                        <th>Log name</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $resultsCount; $i++) {
                                        echo '<tr role="row">';
                                        echo '<td>' . date("Y-m-d H:i:s", strtotime($results['hits']['hits'][$i]['_source']['@timestamp'])) . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['beat']['hostname'] . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['keywords'][0] . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['source_name'] . '</td>';

                                        switch ($results['hits']['hits'][$i]['_source']['level']) {
                                            case "warning":
                                                $label = "label-warning";
                                                break;
                                            case "error":
                                                $label = "label-error";
                                                break;
                                            default:
                                                $label = "label-success";
                                                break;
                                        }

                                        echo '<td><span class="label ' . $label . '">' . $results['hits']['hits'][$i]['_source']['level'] . '</span></td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['log_name'] . '</td>';
                                        echo '<td>' . nl2br($results['hits']['hits'][$i]['_source']['message']) . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Time</th>
                                        <th>Hostname</th>
                                        <th>Message</th>
                                        <th>Level</th>
                                        <th>Source</th>
                                        <th>Log name</th>
                                        <th>Message</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /box-body -->
        </div><!-- /box -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->