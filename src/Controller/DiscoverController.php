<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class DiscoverController extends AbstractController
{
    #[Route(path: '/discover', name: 'discover')]
    public function discover(
        EntityManagerInterface $entityManager,
        CategoryRepository $categoryRepository
    ): Response {
        $categories = $categoryRepository->findAll();
        return $this->render(view: 'discover.html.twig', parameters: [
            'categories' => $categories
        ]);
    }
}
