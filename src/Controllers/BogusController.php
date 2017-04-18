<?php
namespace App\Controllers;

use App\Models\BogusModel;
use Symfony\Component\HttpFoundation\Response;

/**
 * TODO: Figure out how to properly load classes
 */
include __DIR__ . '/../Models/BogusModel.php';

class BogusController
{
    public function __construct()
    {
        $this->bogusModel = new BogusModel;
    }

    /**
     * Test Controller Function
     *
     * @return Response
     */
    public function bogusFunction()
    {
        return new Response($this->bogusModel->bogusFunction());
    }
}
