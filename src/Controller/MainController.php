<?php
/**
 * Created by PhpStorm.
 * User: Nnox
 */
namespace App\Controller;

use App\Normalizator\Normalizator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class MainController extends Controller
{
    private $pathToEntity = "App\Entity\\";

    public function getAction($entity_name, $id): JsonResponse {
        $entity_name = ucfirst($entity_name);
        $entity = $this->getDoctrine()
            ->getRepository($this->pathToEntity . $entity_name)
            ->find($id);

        if (!$entity) {
            throw $this->createNotFoundException(
                'No entity with class ' . $entity_name . ' found for id ' . $id
            );
        }

        return new JsonResponse($entity->show());
    }

    public function getMultipleAction(Request $request, $entity_name) {
        $filter = $request->query->all();

        $entity_name = ucfirst($entity_name);

        if($filter) {
            $entities = $this->getDoctrine()
                ->getRepository($this->pathToEntity . $entity_name)
                ->findBy($filter);
        }
        else {
            $entities = $this->getDoctrine()
                ->getRepository($this->pathToEntity . $entity_name)
                ->findAll();
        }

        if (!$entities) {
            throw $this->createNotFoundException(
                'No entities with class ' . $entity_name
            );
        }

        for ($i = 0; $i < count($entities); $i++) {
            $entities[$i] = $entities[$i]->show();
        }

        return new JsonResponse($entities);
    }

    public function createAction(Request $request, $entity_name)
    {
        $entity_name = $this->pathToEntity . ucfirst($entity_name);
        $entityManager = $this->getDoctrine()->getManager();

        $entity = new $entity_name();
        Normalizator::Normalize($entity, $request);

        $entityManager->persist($entity);
        $entityManager->flush();

        return new Response(json_encode($entity->show()));
    }

    public function updateAction(Request $request, $entity_name, $id)
    {
        $entity_name = ucfirst($entity_name);
        $entityManager = $this->getDoctrine()->getManager();
        $entity = $entityManager->getRepository($this->pathToEntity . $entity_name)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        Normalizator::Normalize($entity, $request);
        $entityManager->persist($entity);
        $entityManager->flush();

        return new Response(json_encode($entity->show()));
    }

    public function deleteAction($entity_name, $id)
    {
        $entity_name = ucfirst($entity_name);
        $entityManager = $this->getDoctrine()->getManager();

        $entity = $this->getDoctrine()
            ->getRepository($this->pathToEntity . $entity_name)
            ->find($id);

        if (!$entity) {
            throw $this->createNotFoundException(
                'No entity with class ' . $entity_name . ' found for id ' . $id
            );
        }

        $entityManager->remove($entity);
        $entityManager->flush();

        return new JsonResponse('Entity with class ' . $entity_name . ' for id ' . $id . ' was deleted');
    }
}