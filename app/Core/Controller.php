<?php
namespace OrangDalam\PeminjamanRuangan\Core;

class Controller {
    protected function model($model)
    {
        $modelPath = __DIR__ . '/../Models/' . $model . '.php';

        if (file_exists($modelPath)) {
            require_once $modelPath;

            $model = 'OrangDalam\PeminjamanRuangan\Models\\' . $model;

            return new $model;
        }
    }

    protected function view($view, $data = []) {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (file_exists($viewPath)) {
            extract($data);

            include $viewPath;
        }
    }
}
