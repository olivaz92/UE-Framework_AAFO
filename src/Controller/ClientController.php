<?php

namespace App\Controller;

use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{

    /**
     * @Route("/client/prenom/{prenom}", name="client_prenom")
     */
    public function prenom($prenom): Response
    {
        for($i=0;$i<=strlen($prenom);$i++)
        {
            if ($prenom[0]=="-")
            {

                $prenom[0]= str_replace("-"," ","-");
            }

            if ($prenom[strlen($prenom) - 1]=="-")
            {
                $prenom[strlen($prenom) - 1]= str_replace("-"," ","-");
            }
        }

        $nom= $this->generateUrl('info',['prenom'=>"AZZIBROUCK"]);
        return new Response("tu es Monsieur $nom $prenom" );
    }

    /**
     * @Route("/client/{prenom}", name="info")
     * @param $prenom
     * @return Response
     */
    public function info( $prenom): Response
    {
        return new Response("$prenom" );
//        return new BinaryFileResponse()
    }

}
