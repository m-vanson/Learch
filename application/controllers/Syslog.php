<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Syslog extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $data['title'] = "View latest 100 syslogs";

        $params = [
            'index' => 'filebeat',
            'body' => [
                'query' => [
                    'match_all' => [
                        'boost' => 1.0,
                    ]
                ],
                'size' => 100,
                'sort' => [
                    [
                        '@timestamp' => [
                            'order' => 'desc'
                        ]
                    ]
                ]
            ],
        ];

        try {
            $data['results'] = $this->client->search($params);
            $this->template('index', $data);
        } catch (Exception $e) {
            $data['error'] = $e;
            $this->template('errors/error', $data);
        }
    }

    public function search() {
        $this->template('search');
    }

}
