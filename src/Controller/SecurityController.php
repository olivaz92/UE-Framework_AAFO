<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/test_login", name="test_login",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function testLogin(Request $request):Response
    {
        $user_email="az@gmail.com";
        $user_password="123456";
        $email_form= $request->request->get('email');
        $password_form= $request->request->get('password');
        $error="";
        if($email_form !=$user_email || $password_form!= $user_password)
        {
            $error="erreur du mail ou du mot de passe";
            $this->redirectToRoute('app_login',['error'=>$error]);

        }
        $this->redirectToRoute('home');

    }
}
