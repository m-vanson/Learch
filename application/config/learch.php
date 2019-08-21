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
 * This is the main configuration file. Use this file to configure the frontend.
 * Make sure this file is not readable by the outside world! 
 * 
 */

/*
 * Which host should we connect to ?
 * It's an array so you can use multiple hosts.
 */
$config['elasticHosts'] = [
        'http://192.168.178.4:9200'
    ];

/*
 * Display Elastic stats
 * If you'd like to see statistics like search time, number of shards, total of matched results etc, set this to true
 * Value: true|false
 */
$config['displayElasticStats'] = true;

/*
 * Should we display recent events and if so,
 * how many events should we display on the short menu ?
 * Value: true|false
 * Value: integer
 */
#'menuDisplayRecentEvents' => true,
#'menuNumberOfRecentEvents' => 10,

/*
 * Display raw API output
 * This is helpful for troubleshooting (displays A LOT OF DATA)
 * DO NOT EVER use this in production!
 * Value: true|false
 */
$config['displayRawOutput'] = true;

/*
 * Time format
 * Just the basic displaying of date and time.
 * http://php.net/manual/en/function.date.php
 */
$config['dateTimeFormat'] = 'j F Y - H:i:s';

/*
 * Search functions
 * 
 * How many records would you like to get (not applicable to the search pages) ?
 * value: integer
 */
$config['eventlogReturnRows'] = 500;

/*
 * Would you like to turn on the highlighter ?
 * This will highlight the term you search for...
 * value: true|false
 */
$config['enableHighlighter'] = true;