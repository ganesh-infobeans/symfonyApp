<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class QuestionaryController extends Controller
{
    public function indexAction(Request $request)
    {
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
        $form = $this->createFormBuilder()
        ->add('q1', 'choice', array('choices' => array('1'=>'YAML','2'=> 'PHP','3'=>'XML','4'=> 'All of above'),'label'=>'Q1.  In Symfony, the routing configuration can be written in .....'))
        ->add('q2', 'choice', array('choices' => array('1'=>'Bundle','2'=> 'Kernel','3'=>'Controller','4'=>'model'),'label' => 'Q2.   Which of the following returns Symfony2 Response object back to the user?  '))
        ->add('q3', 'choice', array('choices' => array('1'=>'Response object','2'=> 'Request Object','3'=>'PHP Object ','4'=>'none'),'label' => 'Q3.  The goal of each controller in Symfony is to return a.....  '))
        ->add('q4', 'choice', array('choices' => array('1'=>'Bundle','2'=> 'Router','3'=>'COntroller ','4'=>'Model'),'label' => 'Q4.  Which of the following in Symfony is a directory that houses everything related to a specific feature, including PHP classes, configuration, and
even stylesheets and Javascript files?.'))
        ->add('save', 'submit', array('label' => 'Submit'))
        ->getForm();

        $form->handleRequest($request);

                if ($form->isValid()) {
                    // perform some action, such as saving the task to the database
                    //$form->bindRequest($request);
                    $data = $form->getData();
                    $rightAnswer = 0;
                    if(!empty($data)) {
                        foreach($data as $key=>$val) {
                            switch($key) {
                                case 'q1' :
                                    if($val == 4)
                                    $rightAnswer++;
                                    break;
                                case 'q2' :
                                    if($val == 2)
                                    $rightAnswer++;
                                    break;
                                case 'q3' :
                                    if($val == 1)
                                    $rightAnswer++;
                                    break;
                                case 'q4' :
                                    if($val == 1)
                                    $rightAnswer++;
                                    break;
                            }
                        }
                    }
//                    $q1=$request->request->get('q1','default value if bar does not exist');
                    $response = new Response('<h1>Your Score is '.$rightAnswer.'</h1>');
                    $response->send();
                    //return $this->redirect($this->generateUrl('task_success'));
                }

        return $this->render('AcmeDemoBundle:Questionary:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
   
}
