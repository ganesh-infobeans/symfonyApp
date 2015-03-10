<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionaryController extends Controller
{
    public function indexAction()
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

        return $this->render('AcmeDemoBundle:Questionary:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
   
}
