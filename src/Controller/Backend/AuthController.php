<?php

namespace App\Controller\Backend;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Controller\AppController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of AuthController
 *
 * @author elitebook
 */
class AuthController extends AppController {

    //put your code here

    public function login(Request $request): Response {
        $data['title_for_layout'] = 'Welcome to symfony :: login page';
        $data['contents'] = 'this is contents';
        //$data['load_css'] = ['/_dist/templates/adminlte/plugins/bootstrap/css/bootstrap.bundle.min.css'];
        //$data['load_js'] = ['/_dist/templates/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'];
        //$data['load_ajax_var'] = [ ['var i = 0;'] ];
        return $this->setLayout('/layouts/adminlte/login',$request, $data);
    }

    public function dashboard(Request $request): Response {
        $data['title_for_layout'] = 'Welcome to symfony';
        $data['contents'] = 'this is contents';
        return $this->setLayout('/layouts/adminlte/dashboard',$request, $data);
    }
}
