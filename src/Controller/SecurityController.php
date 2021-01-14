<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

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
//        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
        $erreur="";
        return $this->render('security/login.html.twig', [ 'erreur' => $erreur]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/test_login", name="test_login",methods={"POST","GET"})
     * @param Request $request
     * @param TranslatableInterface $translator
     * @return Response
     */
    public function testLogin(Request $request, TranslatorInterface $translator):Response
    {
        $user_email="az@gmail.com";
        $user_password="123456";
        $email_form= $request->request->get('email');
        $password_form= $request->request->get('password');
        if ($request->request->get('email')!=null||$request->request->get('password')!=null)
        {
            if($email_form !=$user_email || $password_form!= $user_password)
            {
                $erreur=$translator->trans("Email or password error");
                $this->addFlash('erreur_login',$erreur);
                return $this->render('security/login.html.twig', ['erreur' => $erreur]);

            }
            if($email_form ==$user_email || $password_form== $user_password)
            {
                $this->addFlash('success_login','bienvenue Mr '.$user_email.' nous vous aimons');
                return $this->redirectToRoute('home');

            }
        }

        return $this->render('security/login.html.twig');

    }
}
