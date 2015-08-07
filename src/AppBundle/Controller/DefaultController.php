<?php

namespace AppBundle\Controller;

use AppBundle\Datagrid\AuteurDatagrid;
use AppBundle\Form\AuteurType;
use AppBundle\Propel\Auteur;
use AppBundle\Propel\AuteurQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::default/index.html.twig', array());
    }

    public function listAction(Request $request)
    {
        return $this->render('AppBundle:Default:list.html.twig', array(
            'datagrid' => AuteurDatagrid::create($this->container)->execute(),
        ));
    }

    public function newAction(Request $request)
    {
        $auteur = new Auteur();

        $form = $this->createForm(new AuteurType(), $auteur, array());

        if($request->isMethod('post'))
        {
            $form->handleRequest($request);

            if($form->isValid())
            {
                $data = $form->getData();
                $data->save();
                $this->flash('success', "L'auteur a bien été enregistré.");
                return $this->redirect($this->generateUrl('minimal_auteur_list'));
            }
            else
            {
                $this->flash('danger', "L'auteur ne peut être enregistré : merci de vérifier les informations renseignées.");
            }
        }

        $tpl = array(
            'form' => $form->createView(),
        );

        return $this->render('AppBundle:Default:new.html.twig', $tpl);
    }

   public function editAction(Request $request)
    {
        $auteur = AuteurQuery::create()->findOneById($request->get('id'));

        if(!$auteur)
        {
            throw $this->createNotFoundException();
        }
        $form = $this->createForm(new AuteurType(), $auteur, array());

        if($request->isMethod('post'))
        {
            $form->handleRequest($request);

            if($form->isValid())
            {
                $data = $form->getData();
                $data->save();
                $this->flash('success', "L'auteur a bien été mis à jour.");
                return $this->redirect($this->generateUrl('minimal_auteur_list'));
            }
            else
            {
                $this->flash('danger', "L'auteur ne peut être modifié : merci de vérifier les informations renseignées.");
            }
        }

        return $this->render('AppBundle:Default:edit.html.twig', array(
            'form' => $form->createView(),
            'auteur' => $auteur,
        ));
    }

    public function flash($name, $message)
    {
        $this->get('session')->getFlashBag()->add($name, $message);
    }
}
