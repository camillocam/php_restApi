<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class CircolariModel extends Database
{

    private function getSedeCircolare($sede){
        switch ($sede){
            case "Roma": $sede ="circolariRoma";
                         break;
       
            case "Torino": $sede ="circolariTorino";
                        break;
            case "Silvestri": $sede ="circolariSilvestri";
                        break;
            case "Fabriani": $sede = "circolariFabriani";
                        break;
            default: $sede ="circolariRoma";

        }
    return $sede;
    }

    public function getCircolari($sede,$limit)
    {
    return  $this->select("SELECT * FROM circolariRoma ORDER BY post_id DESC LIMIT ?", ["i",$limit]);

    }



    

}