<?php

// Target/client
interface Share {
    // Request
    public function shareData();
}

 // Adaptee/Service
class WhatsAppShare {
    // Specific request
    public function waShare(String $string) {
        echo "Share data via WhatsApp: $string \n";
    }
}

class WhatsAppShareAdapter implements Share {
    private $whatsAppShare;
    private $data;

    public function __construct(WhatsAppShare $whatsAppShare, String $data) {
        $this->whatsAppShare = $whatsAppShare;
        $this->data = $data;
    }

    public function shareData() {
        $this->whatsAppShare->waShare($this->data);
    }
}

function clientCode(Share $share) {
    $share->shareData();
}

$whatsAppShare = new WhatsAppShare();
$whatsAppShareAdapter = new WhatsAppShareAdapter($whatsAppShare, "Hello World Using Adapter!");
clientCode($whatsAppShareAdapter);
