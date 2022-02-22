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
    public function formulario(Request $request, ManagerRegistry $doctrine): Response{ //AÑADIR

        $entityManager = $doctrine->getManager();

        $articulo = new Articulo();
        
        $form = $this->createForm(ArticuloType::class,$articulo);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            //si devuelve falso es que no se ha creado, asi que se crea el formulario y se renderiza
            $articulo=$form->getData();

            $entityManager->persist($articulo);

            $entityManager->flush();

            return $this->redirectToRoute('listar');
        }
        //ahora le devolvemos la vista del formulario
        return $this-> renderForm('formulario.html.twig',['form'=> $form,]);
    }

    #[Route('/formulario/eliminar/{id}',name:'eliminar')]
    public function eliminar(ManagerRegistry $doctrine,int $id): Response { //ELIMINAR

        $entityManager=$doctrine->getManager();

        $articulo = $entityManager->getRepository(Articulo::class)->find($id);

        $entityManager->remove($articulo);
        $entityManager->flush();

        return $this->redirectToRoute('formulario');
    }

    #[Route("formulario/editar/{id}",name:'editar')]
    public function editar(ManagerRegistry $doctrine, int $id, Request $request): Response { //EDITAR

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

    #[Route("/",name:'listar')]
    public function listar(ManagerRegistry $doctrine, Request $request): Response { //DESPLEGAR NUEVA VISTA DE LISTADO

        $entityManager=$doctrine->getManager();
        $listaArticulos = $entityManager->getRepository(Articulo::class)->findAll();
        
        //ahora le devolvemos la vista del formulario
        return $this-> renderForm('listadoArticulos.html.twig',['articulos'=> $listaArticulos,]);
        
    }

    #[Route("/articulo/{id}",name:'detalle')]
    public function detalle(ManagerRegistry $doctrine,int $id, Request $request): Response { //DESPLEGAR NUEVA VISTA DE LISTADO

        $entityManager=$doctrine->getManager();
        $articulo = $entityManager->getRepository(Articulo::class)->find($id);
        
        //ahora le devolvemos la vista del formulario
        return $this-> renderForm('detalleArticulo.html.twig',['articulos'=> $articulo,]);
        
    }

    
    
    

}
