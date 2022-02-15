<?php

namespace App\Controller;

use App\Entity\Articulo;
use App\Form\ArticuloType;  
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticuloController extends AbstractController
{
    #[Route('/formulario', name: 'formulario')]
    public function formulario(Request $request, ManagerRegistry $doctrine): Response{

        $entityManager = $doctrine->getManager();

        $articulo = new Articulo();
        
        $form = $this->createForm(ArticuloType::class,$articulo);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            //si devuelve falso es que no se ha creado, asi que se crea el formulario y se renderiza
            $articulo=$form->getData();

            $entityManager->persist($articulo);

            $entityManager->flush();

            return $this->redirectToRoute('formulario');
        }
        //ahora le devolvemos la vista del formulario
        return $this-> renderForm('formulario.html.twig',['form'=> $form,]);
    }

    #[Route('/formulario/eliminar/{id}',name:'eliminar')]
    public function eliminar(ManagerRegistry $doctrine,int $id): Response {

        $entityManager=$doctrine->getManager();

        $articulo = $entityManager->getRepository(Articulo::class)->find($id);

        $entityManager->remove($articulo);
        $entityManager->flush();

        return $this->redirectToRoute('formulario');
    }

    #[Route("formulario/editar/{id}",name:'editar')]
    public function editar(ManagerRegistry $doctrine, int $id, Request $request): Response {

        $entityManager=$doctrine->getManager();
        $articulo = $entityManager->getRepository(Articulo::class)->find($id);
        
        $form = $this->createForm(ArticuloType::class,$articulo);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            //si devuelve falso es que no se ha creado, asi que se crea el formulario y se renderiza
            $articulo=$form->getData();

            $entityManager->persist($articulo);

            $entityManager->flush();

            return $this->redirectToRoute('formulario');
        }
        //ahora le devolvemos la vista del formulario
        return $this-> renderForm('formulario.html.twig',['form'=> $form,]);
        
    }

}
