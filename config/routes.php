<?php
//##Décription en php
//use App\Controller\ClientController;
//use App\Controller\ImageController;
//use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
//
//    return function (RoutingConfigurator $routes)
//    {
//        //client prenom
//    $routes->add('client_prenom', '/client/prenom/{prenom}')
//    // the controller value has the format [controller_class, method_name]
//        ->controller([ClientController::class, 'prenom'])
//        ->requirements(['prenom' => '[A-Za-z0-9\-]+']);
//
//    //page d'accueil home
//    $routes->add('home', '/img/home')
//    // the controller value has the format [controller_class, method_name]
//        ->controller([ImageController::class, 'home'])
//        ->requirements(['prenom' => '[A-Za-z0-9\-]+']);
//
//    //page affiche
//    $routes->add('affiche', 'img/data/{image}')
//    // the controller value has the format [controller_class, method_name]
//        ->controller([ImageController::class, 'affiche'])
//        ->requirements(['image' => '[A-Za-z0-9\-]+']);   //page affiche
//
//    //page affiche exo2
//    $routes->add('affiches', 'img/datas/{image}')
//    // the controller value has the format [controller_class, method_name]
//        ->controller([ImageController::class, 'affiches'])
//        ->requirements(['image' => '[A-Za-z0-9\-]+']);   //page affiche
//        //
//        $routes->add('menu', 'img/menu')
//    // the controller value has the format [controller_class, method_name]
//        ->controller([ImageController::class, 'menu']);
//    }
//
//    ?>
