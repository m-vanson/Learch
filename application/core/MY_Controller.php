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
 */

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->client = Elasticsearch\ClientBuilder::create()
                ->setHosts($this->config->item('elasticHosts'))
                ->build();
    }

    public function template($template_name, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/pagehead', $data);

        /*
         * Load views from views/controllername folder. If the file doesn't exist, root views folder will be searched.
         * Because we're checking the file without help from CI, we need the exact path.
         */

        $controllerName = $this->router->fetch_class() . '/';
        $viewsDir = APPPATH . 'views/';

        if (is_array($template_name)) { //return all views in content
            foreach ($template_name as $file_to_load) {
                if (is_file($viewsDir . $controllerName . $file_to_load . '.php')) {
                    $this->load->view($controllerName . $file_to_load, $data);
                } else {
                    $this->load->view($file_to_load, $data);
                }
            }
        } else { //return just the single view
            if (is_file($viewsDir . $controllerName . $template_name . '.php')) {
                $this->load->view($controllerName . $template_name, $data);
            } else {
                $this->load->view($template_name, $data);
            }
        }

        /*
         * Create statistics page if enabled
         */
        if ($this->config->item('displayElasticStats') == TRUE && isset($data['results'])) {
            $this->load->view('templates/statistics', $data);
        }

        if ($this->config->item('displayRawOutput') == TRUE && isset($data['results'])) {
            $this->load->view('templates/rawoutput', $data);
        }
        $this->load->view('templates/footer', $data);
    }

}
