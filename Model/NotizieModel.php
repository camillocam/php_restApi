<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class NotizieModel extends Database
{
    private function getNotizieSede($sede){
    switch ($sede){
        case "Roma": $sede ="notizieRoma";
                     break;
        case "Nazionale": $sede="notizieNazionale";
                        break;
        case  "Torino": $sede ="notizieTorino";
                    break;
        case "Silvestri": $sede ="notizieSilvestri";
                    break;
        case "Fabriani": $sede = "notizieFabriani";
                    break;
        default: $sede ="notizieRoma";

    }
    return $sede;
}

    public function getNotizie($sede,$limit)
    {
    return  $this->select("SELECT * FROM ".$this->getNotizieSede($sede)." ORDER BY ID DESC LIMIT ?", ["i",$limit]);

    }



    

}