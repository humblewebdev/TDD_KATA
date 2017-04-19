<?php
namespace App\Controllers;

use App\Models\BogusModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BogusController
{
    public function __construct(BogusModel $bogusModel)
    {
        $this->bogusModel = $bogusModel;
    }

    /**
     * Test Controller Function
     *
     * @param Request $request
     * @return Response
     */
    public function bogusFunction(Request $request)
    {
        $name = $request->get('name', 'World');

        $message = $this->bogusModel
            ->setName($name)
            ->getMessage();

        return new Response($message);
    }
}
