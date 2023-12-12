<?php

namespace OrangDalam\PeminjamanRuangan\Core;

use OrangDalam\PeminjamanRuangan\Models\AuthModel;

class Controller
{

    protected function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';
        extract($data);
        include $viewPath;
    }
}
