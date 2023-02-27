<?php
include_once("LoginPageController.php");

class FestivalController
{
    public function login()
    {
        $loginController = new LoginPageController();
        $loginController->display();
        //require __DIR__ . '/../views/festival/login.php';
    }
    public function editUser(){
        $editUserController = new EditUserController();
        $editUserController->display();
        require __DIR__ . '/../views/cms/editUser.php';
    }
    public function register()
    {
        require __DIR__ . '/../views/festival/register.php';
    }
    
    public function overview()
    {
        require __DIR__ . '/../views/festival/overview.php';
    }

    public function dance(){
        require __DIR__ . '/../views/festival/dance.php';
    }
    public function yummie()
    {
        require __DIR__ . '/../views/festival/yummie.php';
    }

    public function restaurant()
    {
        require __DIR__ . '/../views/festival/restaurant.php';
    }
}