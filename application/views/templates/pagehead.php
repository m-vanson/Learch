<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="content-wrapper" style="min-height: 1170px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>

        <?php
        /*
         * Breadcrumbs by using CI's uri_string function
         */

        echo '<ol class = "breadcrumb">';
        echo '<li><a href = "#"><i class = "fa fa-dashboard"></i> Home</a></li>';
        $crumbs = explode("/", uri_string());
        foreach ($crumbs as $crumb) {
            echo '<li><a href="#">' . ucfirst($crumb) . '</a></li>';
        }
        echo '</ol>';
        ?>

        <?php echo validation_errors(); ?>

    </section>
    <section class="content">