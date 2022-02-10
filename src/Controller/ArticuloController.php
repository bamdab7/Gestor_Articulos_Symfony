<?php

namespace App\Controller;

use App\Entity\Articulo;
use App\Form\ArticuloType;  
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticuloController extends AbstractController
{
    #[Route('/formulario', name: 'formulario')]
    public function formulario(): Response
    {
        $articulo = new Articulo();
        $form = $this->createForm(ArticuloType::class,$articulo);

        //ahora le devolvemos la vista del formulario
        return $this-> renderForm('formulario.html.twig',[
            'form'=> $form,
        ]);

    }
}
