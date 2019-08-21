<?php
/*
 * File: templates/datatables/eventlog
 * Purpose: Displays the datatable for Eventlogs
 * 
 */
$resultsCount = count($results['hits']['hits']);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div id="eventlog_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="eventlog" class="table table-bordered table-striped table-hover dataTable nowrap" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th></th>
                                        <th>Time</th>
                                        <th>Hostname</th>
                                        <th>Keywords</th>
                                        <th>Source</th>
                                        <th>EventID</th>
                                        <th>Level</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $resultsCount; $i++) {
                                        echo '<tr role="row">';
                                        echo '<td></td>';
                                        echo '<td>' . date("Y-m-d H:i:s", strtotime($results['hits']['hits'][$i]['_source']['@timestamp'])) . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['host']['hostname'] . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['winlog']['keywords'][0] . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['winlog']['provider_name'] . '</td>';
                                        echo '<td>' . $results['hits']['hits'][$i]['_source']['winlog']['event_id'] . '</td>';

                                        switch ($results['hits']['hits'][$i]['_source']['log']['level']) {
                                            case "warning":
                                                $label = "label-warning";
                                                break;
                                            case "error":
                                                $label = "label-danger";
                                                break;
                                            default:
                                                $label = "label-success";
                                                break;
                                        }

                                        echo '<td><span class="label ' . $label . '">' . $results['hits']['hits'][$i]['_source']['log']['level'] . '</span></td>';
                                        if (isset($results['hits]']['hits'][$i]['highlight'])) {
                                            echo '<td>' . nl2br($results['hits']['hits'][$i]['highlight']['message'][0]) . '</td>';
                                        } else {
                                            echo '<td>' . nl2br($results['hits']['hits'][$i]['_source']['message']) . '</td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Time</th>
                                        <th>Hostname</th>
                                        <th>Keywords</th>
                                        <th>Level</th>
                                        <th>Source</th>
                                        <th>EventID</th>
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