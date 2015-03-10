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
                    $rightAnswer = 0;
                    if(!empty($data)) {
                        foreach($data as $key=>$val) {
                            switch($key) {
                                case $q1 :
                                    if($val == 4)
                                    $rightAnswer++;
                                    break;
                                case $q2 :
                                    if($val == 2)
                                    $rightAnswer++;
                                    break;
                            }
                        }
                    }
//                    $q1=$request->request->get('q1','default value if bar does not exist');
                    print_r($rightAnswer);die;
                    //return $this->redirect($this->generateUrl('task_success'));
                }

        return $this->render('AcmeDemoBundle:Questionary:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
   
}
