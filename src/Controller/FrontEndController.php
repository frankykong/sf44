<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\ORM\Mapping as ORM;


//use cocose\WebBundle\Entity\Device;
//use cocose\WebBundle\Entity\Project;
//use cocose\WebBundle\Entity\Reserve;
//use cocose\WebBundle\Entity\Works;
//use Symfony\Component\HttpFoundation\Request;
//use cocose\WebBundle\Entity\Post;


class FrontEndController extends AbstractController
{
    //软件首页展示
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $em = $this->getDoctrine()->getManager();
        //dump('$em');

        $posts = $em->getRepository('App:Post')->findAll();
       // $devices = $em->getRepository('AppBundle:Device')->findAll();
//        //the template path is the relative file path from `templates/`
        return $this->render("home.html.twig", array(
           // 'posts' => $posts,
            'active' => 'home',
          //  'devices' => $devices
        ));
    }
//
//    //场地列表
//    public function  labListAction(){
//
//       // $em = $this->getDoctrine()->getManager();
//        //$posts = $em->getRepository('cocoseWebBundle:Post')->findAll();
//        //the template path is the relative file path from `templates/`
//
//        return $this->render("labList.html.twig", array(
//           //'post' => $posts
//            'active' => 'labList',
//        ));
//    }
//
    /**
     * @Route("/labLists", name="labLists")
     */
    public function  labLists(){
        $em = $this->getDoctrine()->getManager();
        $labData = $em->getRepository('cocoseWebBundle:Post')->findAll();
        return $this->render("labLists.html.twig", array(
            'labData'=>$labData,
            'active' => 'labLists'
        ));
    }

//    public function labNoticeAction(){
//        return $this->render("labNotice.html.twig",array(
//            'active' => 'labNotice'
//        ));
//    }

//    public function  labDetailAction(Request $request,Post $labData){
//
//        return $this->render("labDetail.html.twig", array(
//            'labData' => $labData,
//            'active' => 'labDetail'
//        ));
//    }

//    public function  labDetailsAction(Request $request){
//        $reserve = new Reserve();
//        return $this->render("labDetailsform.html.twig", array(
//                'active' => ' labDetails',
//                "reserveName" => json_encode($reserve),
//                "reserveEmail" => json_encode($reserve),
//                "reservePhone" => json_encode($reserve),
//                "reserveNumber" => json_encode($reserve),
//                "reserveTeacher" => json_encode($reserve),
//                "reserveClass" => json_encode($reserve),
//                "reserveContent" => json_encode($reserve),
//            )
//        );
//
//
//    }

//    public function labSubAction(){
//        return $this->render("labSub.html.twig",array(
//            'active' => 'labSub'
//        ));
//    }
//    public function labConfirmAction(){
//        return $this->render("labConfirm.html.twig",array(
//            'active' => 'labConfirm'
//        ));
//    }
//
    //项目列表
    /**
     * @Route("/equipmentList", name="equipmentList")
     */
    public function equipmentList()
    {
        $em = $this->getDoctrine()->getManager();
        $equipmentData = $em->getRepository('cocoseWebBundle:Device')->findAll();
        return $this->render("equipmentList.html.twig", array(
            'equipmentData'=>$equipmentData,
            'active' => 'equipment'
        ));
    }
//
//    //项目列表
//    public function equipmentDetailAction(Request $request,Device $equipmentData)
//    {
//
//        return $this->render("equipmentDetail.html.twig", array(
//           'equipmentData'=>$equipmentData,
//            'active' => 'projectDetail'
//        ));
//    }
//
//    public function equipmentNoticeAction(){
//        return $this->render("equipmentNotice.html.twig",array(
//            'active' => 'equipmentNotice'
//
//        ));
//    }
//
//    public function equipmentDetailsAction(Request $request)
//    {
//        return $this->render("equipmentDetailsform.html.twig", array(
//            'active' => 'equipmentDetails'
//        ));
//    }
//
    /**
     * @Route("/projectLists", name="projectLists")
     */
    public function projectLists()
    {
        $em = $this->getDoctrine()->getManager();
        $projectData = $em->getRepository('cocoseWebBundle:Project')->findAll();
        return $this->render("projectLists.html.twig", array(
            'projectData'=>$projectData,
            'active' => 'projectLists'
        ));
    }
//
//    public function projectDetailsAction(Request $request,Project $projectData)
//    {
//
//        return $this->render("projectDetails.html.twig", array(
//            'projectData'=>$projectData,
//            'active' => 'projectDetails',
//        ));
//    }
//
    //作品列表
    /**
     * @Route("/worksList", name="worksList")
     */
    public function  worksList(){
        $em = $this->getDoctrine()->getManager();
        $worksData = $em->getRepository('cocoseWebBundle:Works')->findAll();
        dump($worksData);
        return $this->render("worksList.html.twig", array(
            'worksData'=>$worksData,
            'active' => 'worksList'
        ));
    }
//
//    //作品详情
//    public function  workDetailAction(Request $request,Works $workData){
//
//        return $this->render("workDetail.html.twig", array(
//            'workData'=>$workData,
//            'active' => 'workDetail'
//        ));
//    }
//
    //我的
    /**
     * @Route("/my", name="my")
     */
    public function  my(Request $request){

        return $this->render("my.html.twig", array(
            'active' => 'my'
        ));
    }

//
//    public function  reserveAction(Post $post){
//        $em = $this->getDoctrine()->getManager();
//
//        $posts = $em->getRepository('cocoseWebBundle:Post')->findAll();
//        //the template path is the relative file path from `templates/`
//        return $this->render("reserve.html.twig", array(
//            //'post' => $post,
//        ));
//
//    }
//    //KnpPaginatorBundle分页组件
//    public function indexAction($page,$limit){
//        $em = $this->getDoctrine()->getManager();
//        $qb = $em->getRepository('cocoseWebBundle:Post')->createQueryBuilder('');
//        //Appbundle是你的模块DemoList是你的表实体 u是别名后面可接条件
//
//        $paginator = $this->get('knp_paginator');
//        $pagination = $paginator->paginate($qb, $page,$limit);
//
//        return $this->render('news/list.html.twig',['pagination' => $pagination]);
//    }
//










}