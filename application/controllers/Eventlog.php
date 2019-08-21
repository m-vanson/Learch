<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventlog extends MY_Controller {

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

        $data['title'] = "View latest " . $this->config->item('eventlogReturnRows') . " eventlogs";

        $params = [
            'index' => 'winlogbeat',
            'body' => [
                'query' => [
                    'match_all' => [
                        'boost' => 1.0,
                    ]
                ],
                'size' => $this->config->item('eventlogReturnRows'),
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
            $data['count'] = count($data['results']);

            $views = array(
                'templates/datatables/eventlog'
            );

            $this->template($views, $data);
        } catch (Exception $e) {
            $data['error']['message'] = $e->getMessage();
            $this->template('errors/error', $data);
        }
    }

    public function search() {

        $this->form_validation->set_rules('searchQuery', 'Search Query', 'required');

        $data['title'] = "Search eventlogs";
        $data['searchQuery'] = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : NULL;
        $data['maxResults'] = isset($_POST['maxResults']) && is_numeric($_POST['maxResults']) ? $_POST['maxResults'] : 100;

        if ($this->form_validation->run() == FALSE) {
            $views = array(
                'search'
                    #'errors/error'
            );
            $this->template($views, $data);
        } else {

            /*
             * If the highlighter is enabled:
             */
            if ($this->config->item('enableHighlighter') == TRUE) {
                $highlighter = [
                    'highlight' => [
                        'fields' => [
                            'message' => [
                                'number_of_fragments' => 0
                            ]
                        ],
                        'require_field_match' => false
                    ]
                ];
            } else {
                $highlighter = [];
            }

            /*
             * Construct Elastic search query
             */
            $params = [
                'index' => 'winlogbeat',
                'body' => [
                    'query' => [
                        'match' => [
                            'message' => [
                                'query' => $data['searchQuery'],
                                'fuzziness' => 'AUTO',
                            ]
                        ]
                    ],
                    'size' => $data['maxResults'],
                    'sort' => [
                        [
                            '@timestamp' => [
                                'order' => 'desc'
                            ]
                        ]
                    ]
                ],
            ];

            $params['body'] = array_slice($params['body'], 0, 1, true) +
                    $highlighter +
                    array_slice($params['body'], 1, count($params['body']) - 1, true);

            try {
                $data['results'] = $this->client->search($params);

                $views = array(
                    'search',
                    'templates/datatables/eventlog'
                );
                $this->template($views, $data);
            } catch (Exception $e) {
                $data['error']['message'] = $e->getMessage();
                $this->template('errors/error', $data);
            }
        }
    }

}
