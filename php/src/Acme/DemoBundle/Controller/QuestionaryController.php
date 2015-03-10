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
        ->add('q1', 'choice', array('choices' => array('1'=>'Framework','2'=> 'os'),'label'=>'What is Symfony?'))
        ->add('q2', 'choice', array('choices' => array('1'=>'Framework','2'=> 'os')))
        ->add('q3', 'choice', array('choices' => array('1'=>'Framework','2'=> 'os')))
        ->add('q4', 'choice', array('choices' => array('1'=>'Framework','2'=> 'os')))
        ->add('q5', 'choice', array('choices' => array('1'=>'Framework','2'=> 'os')))
        ->add('save', 'submit', array('label' => 'Submit'))
        ->getForm();

        return $this->render('AcmeDemoBundle:Questionary:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
   
}
