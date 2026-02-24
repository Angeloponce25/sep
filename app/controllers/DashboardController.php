<?php
class DashboardController extends Controller {



    public function __construct() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }
    }

    public function index()
    {
        $this->view('dashboard/index', ['title' => 'Dashboard']);
    }
}
