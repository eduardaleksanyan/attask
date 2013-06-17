<?php
class Listener {
    /**
     *
     * @property Client $client
     * @property Room $room
     * @property string $message
     */
    private $client;
    private $room;
    private $message;

    public function __construct() {
        
    }

    /**
     * message  receiving
     * @param Client $client
     * @param Room $room
     * @param type $message
     */
    public function receive(Client $client, Room $room, $message){
        $this->client     = $client;
        $this->room     = $room;
        $this->message  = $message;
        echo $this->client->getClientname() . '  sent ' . $message . ' in ' .  $this->room->getRoomname() . '<br />';
    }
    
    public function getClient(){
        return $this->client;
    }
    
    public function setClient($client){
        $this->client = $client;
    }
    
    public function getRoom(){
        return $this->room;
    }
    
    public function setRoom($room){
        $this->room = $room;
    }
}
?>
