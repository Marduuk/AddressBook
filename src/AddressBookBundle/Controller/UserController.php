<?php

namespace AddressBookBundle\Controller;

use AddressBookBundle\AddressBookBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AddressBookBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AddressBookBundle\Entity\Address;




class UserController extends Controller
{

    public function fromPostToDb($form)
    {
        $post = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        var_dump($em->flush());
        $em->flush();
        return true;
    }

    /**
     * @Route("/new")
     * @Template("AddressBookBundle:User:new.html.twig")
     */
    public function newAction(Request $req){


        $user=new User();
        $form=$this->createFormBuilder($user)
            ->add("name","text")
            ->add("surname","text")
            ->add("description","text")
            ->add("send","submit")
            ->getForm();

        $form->handleRequest($req);

        if ($form->isSubmitted()) {
           // fromPostToDb($form);
            $post = $form->getData();
            var_dump($post);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();


            $name=$post->getName();
            $surname=$post->getSurname();
            $desc=$post->getDescription();// mam wrazenie ze to glupio zrobilem mozna inaczej?


            return $this->render('AddressBookBundle:User:new.html.twig',
                array('success' => "success","name"=>"$name","surname"=>"$surname","desc"=>"$desc"));
        }

        return $this->render('AddressBookBundle:User:new.html.twig',
            array('form' => $form->createView()));

    }

    /**
     * @Route("{id}/modify")
     */

    public function modifyAction(Request $req,$id){

        $repository = $this->getDoctrine()->getRepository('AddressBookBundle:User');
        $entity=$repository->findOneById($id);


        $formModify=$this->createFormBuilder($entity)
            ->add("name","text")
            ->add("surname","text")
            ->add("description","text")
            ->add("send","submit")
            ->getForm();

        $add=new Address();
        $formAddress=$this->createFormBuilder($add)
            //->setAction($this->redirectToRoute("addAddress",array('id'=>$id)))
            ->setAction($this->generateUrl('addAddress', ['id' => $id]))
            ->add("city","text")
            ->add("street","text")
            ->add("housenumber","text")
            ->add("flatnumber","text")
            ->add("send","submit")
            ->getForm();


        $formModify->handleRequest($req);
        if ($formModify->isSubmitted()) {
            echo "123";
            $post = $formModify->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
        }
        return $this->render('AddressBookBundle:User:modify.html.twig',
            array('formModify' => $formModify->createView(),'formAddress' => $formAddress->CreateView()));
    }






    /**
     * @Route("/{id}/delete")
     */
    public function deleteAction($id){
        $repository = $this->getDoctrine()->getRepository('AddressBookBundle:User');

        $entity=$repository->findOneById($id);
        $em = $this->getDoctrine()->getEntityManager();

        $em->remove($entity);
        $em->flush();
        return "to the shadows";
    }
    /**
     * @Route("/{id}")
     */

    public function showAction($id){
        $repository = $this->getDoctrine()->getRepository('AddressBookBundle:User');
        $entity=$repository->findOneById($id);

        $name=$entity->getName();
        $surname=$entity->getSurname();
        $desc=$entity->getDescription();

        //id przekazac
        return $this->render('AddressBookBundle:User:show.html.twig',
            array('success' => "success","name"=>"$name","surname"=>"$surname","desc"=>"$desc","id"=>$id));

    }
    /**
     * @Route("/")
     */
    public function showAllAction(){
        $repository = $this->getDoctrine()->getRepository('AddressBookBundle:User');
        $allEntities=$repository->findAll();

        return $this->render('AddressBookBundle:User:showall.html.twig',
            array("MyArray"=>$allEntities));


    }


}



