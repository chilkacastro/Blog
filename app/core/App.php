<?php
class App
{
    protected $currentController = 'Home';  
    protected $currentMethod = 'index';  
    protected $params = [];

    /*
     * Default constructor 
     */
    public function __construct()
    {
        $url = $this->parseURL(); 

        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->currentController = $url[0];         
            unset($url[0]);                        
        }

        require_once '../app/controllers/' . $this->currentController . '.php';

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

    /* 
     * Parse the url which will be used by the constructor
     */
    public function parseURL() 
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}