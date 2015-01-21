<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FCheckup extends FDatabase {
    
    
    /**
     * Se il risultato della query è solo 1 (il paziente ha una sola visita) aggiunge a checkArray la
     * corrispondenza [codFisc]=>[oggetto visita], con 2 o più risultati invece la corrispondenza è
     * [codFisc]=>[arrayVisite] dove ogni elemento dell'array è un oggetto visita
     *  
     * @param array $checkArray array associativo
     * @param type $cf
     * @return \EVisit
     */
    public function fillCheckupsArray($cf){
        $cfPat=$cf; //togliere
                    $query="SELECT * FROM `visite` WHERE `Codice Fiscale`='".$cfPat."'";
                    $result=$this->query($query);
                    while ( $row=$result->fetch_assoc() ){
                        $v=new EVisit($row['Codice Fiscale'], $row['DataVisita'], $row['Anamnesi'], $row['Esame Obiettivo'], $row['Conclusione'], $row['Prescrizione Esami'], $row['Terapia'], $row['Controllo']);
                        //var_dump($$cfPat);
                        //$checkArray[]=$$cfPat;
                        //$arr[]=$v;
                    }
                    //$checkArray[$cfPat]=$arr;
                    //return $checkArray;
    }
    
    public function insertNewCheckup($array){
        $query1="INSERT INTO `clinica`.`visite`(`Codice Fiscale`, `DataVisita`, `Anamnesi`, `Esame Obiettivo`, `Conclusione`, `Prescrizione Esami`, `Terapia`, `Controllo`)";
        $query2="VALUES ('".$array['CF']."','".$array['dateCheck']."','".$array['medHistory']."','".$array['medExam']."','".$array['conclusions']."','".$array['toDoExams']."','".$array['terapy']."','".$array['checkup']."')";
        $query=$query1." ".$query2;
        $this->query($query);
    }
    
    public function deleteCheckup($cf,$dateCheck){
        if ( $dateCheck=="all" ){
            $query="DELETE FROM `visite` WHERE `Codice Fiscale`='".$cf."'";
        }
        else {
            $query="DELETE FROM `visite` WHERE `Codice Fiscale`='".$cf."' AND `DataVisita`='".$dateCheck."'";
        }
        $this->query($query);
    }
    
    public function updateCheckCF($cfNew,$cfOld){
        $query="UPDATE `visite` SET `Codice Fiscale`='".$cfNew."' WHERE `Codice Fiscale`='".$cfOld."'";
        $this->query($query);
    }
    
    public function updateCheck($array,$cfPatient,$dateCheckOld){
        $query="UPDATE `visite` SET `Codice Fiscale`='".$cfPatient."',`DataVisita`='".$array['dateCheck']."',`Anamnesi`='".$array['medHistory']."',`Esame Obiettivo`='".$array['medExam']."',`Conclusione`='".$array['conclusions']."',`Prescrizione Esami`='".$array['toDoExams']."',`Terapia`='".$array['terapy']."',`Controllo`='".$array['checkup']."' WHERE `Codice Fiscale`='".$cfPatient."' AND `DataVisita`='".$dateCheckOld."'";
        $this->query($query);
    }
    
    
    
    
    
    
}
