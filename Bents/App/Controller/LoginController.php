<?php

namespace Bents\App\Controller {

    use Bents\Core\Controller;

    class LoginController extends Controller
    {

        public function Login()
        {
            //View::$bag['destination'] = filter_var($_GET['destination'], FILTER_VALIDATE_URL);
            $_SESSION['token'] = 'awjdnkajsdn';
            $_SESSION['realEstateId'] = 1;
            $_SESSION['userId'] = 1;
            $this->RenderView();

        }

    }
}