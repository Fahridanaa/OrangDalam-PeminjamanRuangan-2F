<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class MultiStepFormController extends Controller
{
    public function showForm(): void
    {
        $this->view('user/multiStepForm');
    }

    public static function processForm()
    {
        $currentStep = $_GET['step'] ?? '';
        switch ($currentStep) {
            case '1':
                self::processStep1();
                break;
            case '2':
                self::processStep2();
                break;
            case '3':
                self::processStep3();
                break;
            default:
                // Handle unknown step or do nothing
                break;
        }
    }

    private static function processStep1()
    {
        // Proses data dari Langkah 1
        // Contoh: $name = $_POST['name'] ?? '';
    }

    private static function processStep2()
    {
        // Proses data dari Langkah 2
        // Contoh: $email = $_POST['email'] ?? '';
    }

    private static function processStep3()
    {
        // Proses data dari Langkah 3
        // Contoh: $address = $_POST['address'] ?? '';
    }
}
