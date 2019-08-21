<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *    ________                 __ 
 *   / __/ __/__ ___ _________/ / 
 *  / _/_\ \/ -_) _ `/ __/ __/ _ \
 * /___/___/\__/\_,_/_/  \__/_//_/
 *
 * Search application for Elastic eventlogs, syslogs etc.
 *
 * Created by:
 * Solved-IT (www.solved-it.nu)
 * 
 * Displays various statistics if enabled in config (config/esearch.php)
 * 
 */
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Elasticsearch statistics</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header"><?php echo $results['took']; ?></h5>
                            <span class="description-text">Milliseconds</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header"><?php echo $results['_shards']['successful'] . ' | ' . $results['_shards']['skipped'] . ' | ' . $results['_shards']['failed']; ?></h5>
                            <span class="description-text">SUCCESSFUL | SKIPPED | FAILED</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header"><?php echo $results['hits']['total']['value'] ?></h5>
                            <span class="description-text">DOCUMENTS FOUND</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</div>