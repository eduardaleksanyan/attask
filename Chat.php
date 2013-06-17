<?php
require_once('Room.php');
require_once('Client.php');
require_once('Listener.php');
class Chat {
    /**
     *
     * @property array $clientList
     * @property array $roomList
     */
    private $clientList;
    private $roomList;

    public function __construct() {
        $this->clientList = array();
        $this->roomList = array();
    }
    
    /**
     * create Client
     * @param string $clientName
     * @return \Client
     */
    public function createClient($clientName){
        $client= $this->_is_client_exist($clientName);
        if(!$client){
            $client = new Client($clientName);
            $this->clientList[] = $client;
        } 
        return $client;
    }
    
    /**
     * create Chatroom
     * @param string $roomName
     * @return \Room
     */
    public function createChatroom($roomName){
        $room = $this->_is_room_exist($roomName);
        if(!$room){
            $room = new Room($roomName);
            $this->roomList[] = $room;
        } 
        return $room;
    }
    
    /**
     * check, does the room with current name exists or no
     * @param string $roomName
     * @return boolean
     */
    private function _is_room_exist($roomName){
        foreach ($this->roomList as $room_item){
            if($room_item->getRoomname() == $roomName)
                return $room_item;
        }
        return false;
    }
    
    /**
     * check, does the client with current name exists or no
     * @param string $clientName
     * @return boolean
     */
    private function _is_client_exist($clientName){
        foreach ($this->clientList as $client_item){
            if($client_item->getClientname() == $clientName)
                return $client_item;
        }
        return false;
    }
    
}
?>
