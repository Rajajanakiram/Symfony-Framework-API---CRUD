<?php

// src/Controller/PalindromeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\HttpFoundation\JsonResponse;

class StringReverseController extends AbstractController
{
    public function __construct(Profiler $profiler)
    {
         $profiler->disable();
    }

    /**
     * @Route("/string-reverse", name="string_reverse_form")
     */
    public function form()
    {
        // the template path is the relative file path from `templates/`
        return $this->render('string-reverse/form.html.twig');
    }

    /**
     * @Route("/string-reverse/get", name="string_reverse", methods={"POST"})
     */
    public function reverse(Request $request): JsonResponse
    {
        $reverseString = '';
        $string = $request->request->get('string');
        $i = 0;
        while (isset($string[$i])) {
          $reverseString = $string[$i].$reverseString; 
          $i++;
        }
        return new JsonResponse([
            'status' => ($reverseString)? true : false,
            'string' => $reverseString
        ], Response::HTTP_CREATED);
    }
}
