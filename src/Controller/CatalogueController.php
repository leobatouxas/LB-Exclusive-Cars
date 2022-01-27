<?php

namespace App\Controller;

use App\Repository\VehiculeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catalogue')]
    public function index(VehiculeRepository $vehiculeRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $data = $vehiculeRepository->findAll();

        $vehicules = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            25
        );
        return $this->render('vehicule/catalogue.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }
}
