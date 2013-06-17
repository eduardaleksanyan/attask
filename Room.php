<?php
class Room {
    /**
     *
     * @property string $roomname
     * @property array $chatclients
     */
    private $roomname;
    private $chatclients;
    
    public function __construct($roomName) {
        $this->chatclients = array();
        $this->roomname = $roomName;
    }
    
    /**
     * add client
     * @param Client $client
     */
    public function addClient(Client $client){
        if(!$this->_is_client_exist($client))
            array_push($this->chatclients, $client);
    }
    
    /**
     * send messag
     * @param Client $client
     * @param string $message
     * @return string
     */
    public function send(Client $client, $message){
        if(empty($this->chatclients)) 
            return 'No client';
        foreach ($this->chatclients as $item){
            if(is_object($item->getListener()))
                $item->getListener()->receive($client, $this, $message);
        }
    }
    
    /**
     *  check, does the client with name exists or no
     * @param Client $client
     * @return boolean
     */
    private function _is_client_exist(Client $client){
        foreach ($this->chatclients as $client_item){
            if($client_item->getClientname() == $client->getClientname())
                return true;
        }
        return false;
    }
    
    public function getOccupants(){
        return $this->chatclients;
    }
    
    public function getRoomname(){
        return $this->roomname;
    }
    
    public function setRoomname($roomname){
        $this->roomname = $roomname;
    }
    
}

?>
