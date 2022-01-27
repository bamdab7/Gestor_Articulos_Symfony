<?php
namespace App\Controller;

use App\Entity\Articulo;
use App\Form\Type\ArticuloType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticuloController extends AbstractController{

    public function new(Request $request): Response{
        $articulo = new Articulo();

        $form = $this->createForm(ArticuloType,$articulo);
    }
}

?>