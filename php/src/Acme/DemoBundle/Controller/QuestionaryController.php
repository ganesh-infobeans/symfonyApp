<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        ->add('q1', 'choice', array('choices' => array('1'=>'YAML','2'=> 'PHP','3'=>'XML','4'=> 'All of above'),'label'=>'In Symfony, the routing configuration can be written in .....'))
        ->add('q2', 'choice', array('choices' => array('1'=>'Bundle','2'=> 'Kernel','3'=>'Controller','4'=>'model'),'label' => ' Which of the following returns Symfony2 Response object back to the user?  '))
        ->add('save', 'submit', array('label' => 'Submit'))
        ->getForm();

        $form->handleRequest($request);

                if ($form->isValid()) {
                    // perform some action, such as saving the task to the database
                    //$form->bindRequest($request);
                    $data = $form->getData();
                    print_r($data);die;
                    //return $this->redirect($this->generateUrl('task_success'));
                }

        return $this->render('AcmeDemoBundle:Questionary:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
   
}
