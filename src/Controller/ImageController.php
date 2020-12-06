<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    /**
     * @Route("/img/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('img/home.html.twig', [
            'titre' => 'Bienvenue sur notre site des image',
        ]);
    }

    /**
     * @Route("/img/datas/{image}", name="affiches")
     */
    public function affiches($image): Response
    {
        //le chemin du repertoire des images
        $path = '../public/data/img';
        //on vérifie via un compteur si le fichier est présent ou pas
        $cpt=0;
        //on récupère tout les fichiers du repertoire img
        $images=scandir($path);
        foreach ($images as $img)
       {
            //si l'image est presente on ajoute +1 à notre compteur
           if ($img == $image)
           {
               $cpt=$cpt+1;
           }
       }
        if ($cpt==0)
        {
            $txt= "Veuillez consulter la liste des images disponibles au dessus";foreach($images as $img){echo $img.",<br>";}

            return new Response($txt);
        }
        else{

           return $this->file("$path/$image.jpg");
        }


    }

    /**
     * @Route("/img/data/{image}", name="affiche")
     */
    public function affiche($image): Response
    {
        //le chemin du repertoire des images
        $path = '../public/data/img';
        return $this->file("$path/$image");

    }

    /**
     * @Route("/img/menu", name="menu")
     */
    public function menu(): Response
    {
        $path = '../public/data/img';
        //on récupère tout les fichiers du repertoire img
        $imagesRepository=scandir($path);
        $images=[];
        foreach ($imagesRepository as $image){
            if (is_dir($image)==false)
            {   $i=0;
                $images[]= $image;
                $i=$i+1;
            }
        }
        return $this->render( 'img/menu.html.twig',[
            'images' => $images
        ]);
    }

}
