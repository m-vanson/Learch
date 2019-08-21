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
 * Displays the raw output if enabled in config (config/esearch.php)
 * 
 */
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Raw API output</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <pre>
                    <?php echo var_dump($results); ?>
                </pre>
            </div>
        </div>
    </div>
</div>