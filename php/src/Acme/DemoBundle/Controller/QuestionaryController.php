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
        ->add('task', 'text')
        ->add('dueDate', 'date')
        ->add('save', 'submit', array('label' => 'Create Task'))
        ->getForm();

        return $this->render('AcmeDemoBundle:Questionary:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
   
}
