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
 * Purpose: Displays the search form for Eventlogs
 * 
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class = "box">
            <form class="form-horizontal" method="post" target="_self">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputQuery" class="col-sm-2 control-label">Search query</label>
                        <div class="col-sm-10">
                            <input type="text" name="searchQuery" class="form-control" id="inputQuery" value="<?php echo set_value('searchQuery'); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="maxResults" class="col-sm-2 control-label">Max results</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="maxResults" name="maxResults">
                                <option name="100">100</option>
                                <option name="200">200</option>
                                <option name="300">300</option>
                                <option name="400">400</option>
                                <option name="500">500</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /box-body -->
                <div class="box-footer">
                    <button type="cancel" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info">Search</button>
                </div><!-- /box-footer -->
            </form>
        </div><!-- /box -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->