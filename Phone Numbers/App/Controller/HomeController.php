<?php
include("./Helpers/Controller.php");
include("./App/Validation/Validation.php");
include("./App/Query/phoneNumber.php");
include("./App/Filter/filter.php");


class HomeController extends Controller
{
    public function load()
    {
        $phones = (new PhoneNumber())->fetchPhoneNumbers('./Database/sample.db');
        $phones = (new Validation( include('./Helpers/Regex.php')))->validate($phones);
        $parameters = $this->adjustParameters();
        $phones = (new Filter())->filterBy($parameters, $phones);
        return $this->display('index', $phones);
    }

    private function adjustParameters(){
        $parameters['country'] = $_GET['country'] ?? "";
        $parameters['state'] = $_GET['state'] ?? "";
        return $parameters;
    }
}
