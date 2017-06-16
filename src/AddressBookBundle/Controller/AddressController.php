<?php

namespace AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AddressBookBundle\AddressBookBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AddressBookBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AddressBookBundle\Entity\Address;


class AddressController extends Controller
{
    /**
     * @Route("/{id}/addAddress",name="addAddress")
     */
    public function addAddressAction(Request $req,$id)// CZY TEN SPOSOB JEST DOBRY?
    {
        $form=$req->request->get('form');

        $address= new Address();
        $address->setCity($form['city']);
        $address->setStreet($form['street']);
        $address->setHousenumber($form['housenumber']);
        $address->setFlatnumber($form['flatnumber']);

        $repositoryUser = $this->getDoctrine()->getRepository('AddressBookBundle:User');

        $user=$repositoryUser->findOneById($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($address);
        $em->flush();
        $address->getId();
        $user->setAddress($address);
        $em->persist($user);
        $em->flush();

        return $this->render('AddressBookBundle:Address:add_address.html.twig');
    }

}
