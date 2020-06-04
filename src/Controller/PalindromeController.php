<?php

// src/Controller/PalindromeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\HttpFoundation\JsonResponse;

class PalindromeController extends AbstractController
{
    public function __construct(Profiler $profiler)
    {
         $profiler->disable();
    }

    /**
     * @Route("/palindrome", name="form")
     */
    public function form()
    {
        // the template path is the relative file path from `templates/`
        return $this->render('palindrome/form.html.twig', [
            'palindrome' => ""
        ]);
    }

    /**
     * @Route("/palindrome/check", name="check_palindrome", methods={"POST"})
     */
    public function checkPalindrome(Request $request): JsonResponse
    {
        
        $string = $request->request->get('string');
        return new JsonResponse([
            'status' => ($string === strrev($string))?  true : false
        ], Response::HTTP_CREATED);
    }
}
