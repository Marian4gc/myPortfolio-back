<?php

namespace App\Controller;

use App\Entity\Portfolio;
use App\Form\PortfolioType;
use App\Repository\PortfolioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/apiportfolio')]
class ApiController extends AbstractController
{
    #[Route('/list', name: 'app_apiportfolio_index', methods: ['GET'])]
    public function index(PortfolioRepository $portfolioRepository): Response
    {
        $portfolio = $portfolioRepository->findAll();

        $data = [];

        foreach ($portfolio as $p) {
            $data[] = [
                'id' => $p->getId(),
                'name' => $p->getName(),
                'description' => $p->getDescription(),
                'image' => $p->getImage(),
                'link' => $p->getLink(),
            ];
            
        }

        //dump($data);die; 
        //return $this->json($data);
        return $this->json($data, $status = 200, $headers = ['Access-Control-Allow-Origin'=>'*']);
    }
}

