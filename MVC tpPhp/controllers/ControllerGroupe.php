<?php

class ControllerGroupe
{
    private $_url;

    public function __construct($url)
    {
        $this->_url = $url;
    }

    public function groupe()
    {
        try {
            require 'models/model.php';
            $model = new Model();
            $list = $model->listEleve();
            $nom = array();
            $prenom = array();

            $i = 0;
            foreach ($list as $key) {
                if ($i % 2) {
                    array_push($prenom, $key);
                    $i++;
                } else {
                    array_push($nom, $key);
                    $i++;
                }
            }
            $osef=['M.','Mme'];
            $i = 0;
            foreach ($prenom as $key){
                $key2 =$nom[$i].' '.ucfirst(strtolower(str_replace($osef,'',$key))) ;
                array_shift($prenom);
                array_push($prenom, $key2);
                $i++;
            }

            function rangeEleveParGroupe(int $I_nbGroupe, array $list): array{
                $A_groupeFinal = array();
                $A_listEleve = $list;
                $I_eleveParGroupe= sizeof($list)/$I_nbGroupe -1 ;

                for ($j = 0; $j< $I_nbGroupe; $j++) {
                    $A_groupe=array();
                    for ($i = 0; $i < $I_eleveParGroupe; $i++) {
                        $I_rand = rand(0, sizeof($A_listEleve) - 1);
                        array_push($A_groupe, $A_listEleve[$I_rand]);
                        unset($A_listEleve[$I_rand]);
                        $A_listEleve = array_values($A_listEleve);
                    }
                    array_push($A_groupeFinal, $A_groupe);
                }
                $i=0;
                foreach ($A_listEleve as $rest){
                    array_push($A_groupeFinal[$i],$rest);
                    $i++;
                }


                return $A_groupeFinal;
            }
            if ((int)$this->_url != null){
                return rangeEleveParGroupe((int)$this->_url,$prenom);
            }else{
                throw new Exception('nombre Invalide');
            }

        }catch (Exception $e){
            require_once ('views/viewErreur.php');
        }

    }
}