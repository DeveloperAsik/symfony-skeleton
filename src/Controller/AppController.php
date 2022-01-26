<?php

namespace App\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
/**
 * Description of AuthController
 *
 * @author elitebook
 */
class AppController extends AbstractController {

    //put your code here
    public function setLayout($layout, $request, $data){
      $controller = $this->getDetailsController($request);
      $data['_controller_name'] = $controller['_controller_name'];
      $data['_action_name'] = $controller['_action_name'];
      $data['_path_global_js'] = $controller['_path_global_js'];
      $data['_path_view_html'] = $controller['_path_view_html'];
      $data['_path_view_js'] = $controller['_path_view_js'];
      return $this->render($layout . '.html.twig', $data);
    }

    protected function getDetailsController($request){
      $attributes = $request->attributes->get('_controller');
      $attributes_path = explode('::', $attributes);
      $_controller = explode('\\',$attributes_path[0]);
      $_c_path = '';
      foreach($_controller as $k => $v){
        if($k != 0 && $k != 1){
          if(!empty($_c_path)){
            $_c_path .= '/';
          }
          $_c_path .= str_replace('Controller','',$v);
        }
      }
      $_controller_total_path = count($_controller);
      $_controller_id = $_controller_total_path -1;
      return [
        '_controller_name' =>$_controller[$_controller_id],
        '_action_name'=>$attributes_path[1],
        '_path_global_js' => '/pages/global_js.html.twig',
        '_path_view_html' => trim(strtolower('/pages/'. $_c_path . '/' . $attributes_path[1] .'_html.html.twig')),
        '_path_view_js' => trim(strtolower('/pages/'. $_c_path . '/' . $attributes_path[1] .'_js.html.twig')),
      ];
    }
}
