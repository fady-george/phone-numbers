<?php
include("./App/Interface/ValidationInterface.php");

class Validation implements ValidationInterface{

    protected $validators;

    public function __construct($validators){
        $this->validators = $validators['Regex'];

    }

    public function validate($data = []){
        $index = 0;
        foreach($data as $phone){
            $phoneArray = explode(' ', $phone);
            $parsed[$index]['state'] = $this->getState($phone);
            $parsed[$index]['countryCode'] = $this->getCountryCode($phone);
            $parsed[$index]['country'] = $this->getCountry($phone);
            $parsed[$index]['phone'] = $phoneArray[1];
            $index++;
        }
        return $parsed;
    }

    protected function getState($phone){
      
        $valid = "NOK";

        foreach ($this->validators as $validator)
        {
            preg_match('/' . $validator['regex'] . '/', $phone, $matches);
            
            if (sizeof($matches) > 0) {
                $valid = "OK";
            }
        }
        return $valid;
    }

    protected function getCountryCode($phone){

        foreach ($this->validators as $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $phone, $matches);
            
            if (sizeof($matches) > 0) {
                $code = $validator['countryCode'];
            }
        }

        return $code;

    }

    protected function getCountry($phone){

        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $phone, $matches);
            
            if (sizeof($matches) > 0) {
                $country = $key;
            }
        }

        return $country;

    }


}