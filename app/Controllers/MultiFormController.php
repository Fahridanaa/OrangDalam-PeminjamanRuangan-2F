<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class MultiFormController extends Controller
{
    public function showForm(): void
    {
        $this->view('user/multiForm');
    }

    public static function processForm()
    {
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }
    }
}
