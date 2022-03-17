<?php

/*
        This is our core app file. 
        It is responsible for the routing of our application 
        Programmatically mapping of URLs to controllers and methods

        URL pattern:- /controller/method/params
    */

class App
{

    protected $currentController = 'Home';  // Home is the default controller until it is changed
    protected $currentMethod = 'index';     // default method if no method is given
    protected $params = [];

    // default constructor of the App

    public function __construct()
    {
        $url = $this->parseURL(); // calls the parseURL() method which will return an array -> $url here is a local variable

        // CONTROLLER PART: Checks if controller name exists // $url[0] is dedicated for the controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->currentController = $url[0];          // if it does exist then change the currentController
            unset($url[0]);                              // unset the url[0] because you already set the currentController // it has served its purpose so its now time to clean it up for later usage
        }

        // Require the controller     // if this is not done then it will not work
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller class   // after require_once then create an object of the currentController
        $this->currentController = new $this->currentController;

        // METHOD PART: Check for the method name in the url | url[1]
        if (isset($url[1])) {
            //check to see if such method exists in the conroller
            if (method_exists($this->currentController, $url[1])) {   // checks if the input method exists in the currentController
                $this->currentMethod = $url[1];     // if it does then set/replace the currentMethod to the value of $url[1]
                unset($url[1]);                     // then unset the $url[1] because it has now been used on the currentMethod // do this for later usage
            }
        }

        // PARAMETERS PART: Get the params from the url -> if theres no more value then return an empty array but if there is still a value return all the values as an array
        $this->params = $url ? array_values($url) : [];   // if there is still values

        // Calling the method in our currentController with an array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);  // call_user_func_array is ([class and method], array of params)
    }

    // method to parse the url which will be used by the constructor
    public function parseURL()   // returns an array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}