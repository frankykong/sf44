<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Post;
use App\Entity\Device;
use App\Entity\Project;
use App\Entity\Works;

class FrontEndController extends AbstractController
{
    //软件首页展示
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('App:Post')->findAll();
        $devices = $em->getRepository('App:Device')->findAll();
        //the template path is the relative file path from `templates/`
        return $this->render("home.html.twig", array(
            'posts' => $posts,
            'active' => 'home',
            'devices' => $devices
        ));
    }

    //场地列表
    /**
     * @Route("/labLists", name="labLists")
     */
    public function  labLists(){
        $em = $this->getDoctrine()->getManager();
        $labData = $em->getRepository('App:Post')->findAll();
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

    /**
     * @Route("/labdetail/{id}", name="labDetail")
     */
    public function  labDetail(Request $request,Post $labData)
    {
//        $em = $this->getDoctrine()->getManager();
//        $labData = $em->getRepository('App:Post')->findOneBy('id');
        //dump($labData);
        return $this->render("labDetail.html.twig", array(
            'labData' => $labData,
            'active' => 'labDetail'
        ));

//        return $this->json([
//            'location' => 'dddd'
//        ]);
    }
    /**
     * @Route("/labNotice", name="labNotice")
     */
    public function labNotice(){
        return $this->render("labNotice.html.twig", array(
            'active' => 'labNotice'
        ));
    }

    //提交表单数据
    /**
     * @Route("/labDetailsform", name="labDetailsform")
     */
    public function labDetailsform(Request $request):Response
    {
        return $this->render("labDetailsform.html.twig", array(
            'active' => 'labDetailsform'
        ));

    }

    /**
     * @Route("/labSub", name="labSub")
     */
    public function labSubAction(){
        return $this->render("labSub.html.twig",array(
            'active' => 'labSub'
        ));
    }

    /**
     * @Route("/labConfirm", name="labConfirm")
     */
    public function labConfirmAction(){
        return $this->render("labConfirm.html.twig",array(
            'active' => 'labConfirm'
        ));
    }

    //项目列表
    /**
     * @Route("/equipmentList", name="equipmentList")
     */
    public function equipmentList()
    {
        $em = $this->getDoctrine()->getManager();
        $equipmentData = $em->getRepository('App:Device')->findAll();
        return $this->render("equipmentList.html.twig", array(
            'equipmentData'=>$equipmentData,
            'active' => 'equipment'
        ));
    }

    //项目列表
    /**
     * @Route("/equipmentDetail/{id}", name="equipmentDetail")
     */
    public function equipmentDetail(Request $request,Device $equipmentData)
    {

        return $this->render("equipmentDetail.html.twig", array(
           'equipmentData'=>$equipmentData,
            'active' => 'projectDetail'
        ));
    }

    /**
     * @Route("/equipmentNotice", name="equipmentNotice")
     */
    public function equipmentNoticeAction(){
        return $this->render("equipmentNotice.html.twig",array(
            'active' => 'equipmentNotice'

        ));
    }

    /**
     * @Route("/equipmentDetailsform", name="equipmentDetailsform")
     */
    public function equipmentDetailsformAction(Request $request)
    {
        return $this->render("equipmentDetailsform.html.twig", array(
            'active' => 'equipmentDetails'
        ));
    }

    /**
     * @Route("/projectLists", name="projectLists")
     */
    public function projectLists(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $projectData = $em->getRepository('App:Project')->findAll();
        return $this->render("projectLists.html.twig", array(
            'projectData'=>$projectData,
            'active' => 'projectLists'
        ));
    }

    /**
     * @Route("/projectDetails/{id}", name="projectDetails")
     */
    public function projectDetails(Request $request,Project $projectData)
    {
        return $this->render('projectDetails.html.twig',array(
            'projectData'=>$projectData,
            'active' => 'projectDetails'
        ));
    }

    //作品列表
    /**
     * @Route("/worksList", name="worksList")
     */
    public function  worksList(){
        $em = $this->getDoctrine()->getManager();
        $worksData = $em->getRepository('App:Works')->findAll();
        dump($worksData);
        return $this->render("worksList.html.twig", array(
            'worksData'=>$worksData,
            'active' => 'worksList'
        ));
    }

    //作品详情
    /**
     * @Route("/workDetail/{id}", name="workDetail")
     */
    public function  workDetail(Request $request,Works $workData){

        return $this->render("workDetail.html.twig", array(
            'workData'=>$workData,
            'active' => 'workDetail'
        ));
    }

    //我的
    /**
     * @Route("/my", name="my")
     */
    public function  my(Request $request){

        return $this->render("my.html.twig", array(
            'active' => 'my'
        ));
    }

}