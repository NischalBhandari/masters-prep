<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Question;

class QuestionController extends AbstractController
{
    /**
     * @Route("/question", name="question")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/QuestionController.php',
        ]);
    }

    /**
     * @Route("/question/test", name="question_test")
     */
    public function createQuestion(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $question = new Question();
        $question->setQuestionStatement('What is your name');
        $question->setQuestionLevel(1);
        $entityManager->persist($question);
        $entityManager->flush();
        return new Response('saved new question with id'.$question->getId());
    }
}
