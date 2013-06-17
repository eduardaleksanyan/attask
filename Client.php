<?php
class Client {
     /**
     *
     * @property string $clientname
     * @property Listener $listener
     */
    private $clientname;
    private $listener;
    public function __construct($clientname) {
        $this->clientname = $clientname;
        $this->listener      = null;
    }
     
    public function addListener(Listener $listener){
        $this->listener = $listener;
    }
    
     public function getListener(){
        return $this->listener;
    }
    
    public function setListener($listener){
        $this->listener = $listener;
    }
    
     public function getClientname(){
        return $this->clientname;
    }
    
    public function setClientname($clientname){
        $this->clientname = $clientname;
    }
}

?>
