<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="blog")
     */
    public function blogAction(Request $request)
    {
       $repository = $this->getDoctrine()->getRepository('AppBundle:Articulos');
       $noticias = $repository->findAllOrderedByfechaHora();

       return $this->render('default/blog.html.twig', array('noticias' => $noticias) );

   }

    /**
     * @Route("/noticia/{id}", name="noticia", requirements={"id"="\d+"})
     */
    public function noticiaUnicaAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Articulos');
        $url_atras = $this->generateUrl('blog');
        $noticia = $repository->findOneById($id);
        return $this->render('default/noticia.html.twig' , array('n' => $noticia, 'url_atras'=>$url_atras ) );
    }

    /**
     * @Route("/blog.{_format}", name="_json_xml" , requirements={"_format": "json|xml"})
     */
    public function noticiasJsonXmlAction($_format)
    {
        //echo $_format;
        //exit();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Articulos');
        $tareas = $repository->findAllOrderedByDescripcion();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContenido = $serializer->serialize($tareas , $_format);


        $response = new Response();
        $response->headers->set('Content-type', 'application/'.$_format);
        $response->setContent($jsonContenido);
        return $response;
    }

}
