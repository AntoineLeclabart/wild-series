<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    /**
     * @Route("/program/", name="program_index")
     */
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository
        ->findAll();

        return $this->render('Program/index.html.twig', [
            'website' => 'Wild Séries',
            'programs' => $programs,
         ]);
    }

    /**
     * @Route("/program/{id}", methods={"GET"}, name="program_show", requirements={"id"="\d+"})
     */
    public function show(int $id): Response
    {
    return $this->render('program/show.html.twig', [
        'program' => $id,
     ]);
    }
}