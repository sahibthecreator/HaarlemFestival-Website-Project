<?php
require_once __DIR__ . '/../services/restaurantservice.php';

class VisitHaarlemController
{
    private $restaurantService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
    }

    public function index()
    {
        require __DIR__ . '/../views/visithaarlem/index.php';
    }

    public function food()
    {
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/visithaarlem/food.php';
    }

    public function history()
    {
        require __DIR__ . '/../views/visithaarlem/history.php';
    }

    public function culture(){        
        require __DIR__ . '/../views/visithaarlem/culture.php';
    }
    public function theatre(){
        require __DIR__ . '/../views/visithaarlem/theatre.php';
    }
    public function festivalCulture(){
        require __DIR__ . '/../views/visithaarlem/cultureFestival.php';
    }
    public function museum(){
        require __DIR__ . '/../views/visithaarlem/museum.php';
    }
    public function kids()
    {
        require __DIR__ . '/../views/visithaarlem/kids.php';
    }
    public function dashboard()
    {
        require __DIR__ . '/../views/cms/dashboard.php';
    }

}