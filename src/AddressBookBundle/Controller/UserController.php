<?php

namespace AddressBookBundle\Controller;

use AddressBookBundle\Form\Type\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AddressBookBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/", name="addressbook_user_showall")
     */
    public function showAllAction()
    {
        $em = $this->get('address_book.entity.repository_user');
        $users = $em->findAll();

        return $this->render('AddressBookBundle:User:showall.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/new", name="addressbook_user_new")
     * @param Request $request
     * @return Response
     */
    public function newUserAction(Request $request)
    {

        $user = new User();

        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $post = $form->getData();
            $em = $this->get('address_book.entity.repository_user');
            $em->save($post);

            $this->addFlash('success', 'User was added.');

            return $this->redirectToRoute('addressbook_user_showall');
        }

        return $this->render('AddressBookBundle:User:new.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/modify/{id}", name="addressbook_user_modify")
     * @param Request $request
     * @param User $user
     * @return Response
     */

    public function modifyAction(Request $request, User $user)
    {

        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $post = $form->getData();

            $em = $this->get('address_book.entity.repository_user');
            $em->save($post);

            $this->addFlash('success', 'User data was changed.');

            return $this->redirectToRoute('addressbook_user_showall');
        }


        return $this->render('AddressBookBundle:User:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="addressbook_user_delete")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(User $user){

        if ($user === null) {
            return $this->redirectToRoute('addressbook_user_showall');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $this->addFlash('danger', 'User was deleted.');

        return $this->redirectToRoute('addressbook_user_showall');
    }

    /**
     * @Route("/info/{id}", name="addressbook_user_info")
     * @param User $u
     * @return Response
     */
    public function showAction(User $u){

        $user = $this->get('address_book.entity.repository_user')->find($u);

        return $this->render('AddressBookBundle:User:show.html.twig', [
            'user' => $user
        ]);

    }

}



