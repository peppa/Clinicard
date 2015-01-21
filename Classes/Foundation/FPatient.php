<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FPatient extends FDatabase {
    
    public function fillPatientsArray(){
        $query="SELECT * FROM `pazienti`";
        $result=$this->query($query);
        while ( $row=$result->fetch_assoc() ){
            $cfEn=md5($row['Codice Fiscale']);
            $$cfEn=new EPatient($row['Nome'],$row['Cognome'],$row['Codice Fiscale'],$row['DataNascita'],$row['Sesso']); //il nome dell'oggetto è $[codice fiscale]
            //$patArray[]=$$string;                
        }
        //return $patArray;
    }
    
    public function findPatient($key){
            $query="SELECT `Nome`,`Cognome`,`Codice Fiscale`,`DataNascita` FROM `pazienti` WHERE `Nome`='".$key."' or `Cognome`='".$key."' or `Codice Fiscale`='".$key."'";
            $result=$this->query($query);
            
            $numRows=0;
            while ( $row=$result->fetch_assoc() ){
                $results[$numRows]=array('name'=>$row['Nome'],'surname'=>$row['Cognome'],'cf'=>$row['Codice Fiscale'],'dateBirth'=>$row['DataNascita'],'link'=>md5($row['Codice Fiscale']));
                $numRows++;                
            }
            return $results;
    }
    
    public function getPatientDetail($encryptedCF){
            $cfPatient=$this->findCodFisc($encryptedCF);
            $query="SELECT * FROM `pazienti` WHERE `Codice Fiscale`='".$cfPatient."'";
            $result=$this->query($query);
            while ( $row=$result->fetch_assoc() ){
                    
                    $info=array('name'=>$row['Nome'],
				'surname'=>$row['Cognome'],
				'gender'=>$row['Sesso'],
				'dateBirth'=>$row['DataNascita'],
				'CF'=>$row['Codice Fiscale'],
				'dateCheck'=>$row['DataVisita'],
				'medHistory'=>$row['Anamnesi'],
				'medExam'=>$row['Esame Obiettivo'],
				'conclusions'=>$row['Conclusione'],
				'toDoExams'=>$row['Prescrizione Esami'],
				'terapy'=>$row['Terapia'],
				'checkup'=>$row['Controllo']);
	    }
            return $info;
    }
    
    public function findCodFisc($encryptedCF){ //forse va spostata in FDatabase
            $query="SELECT `Codice Fiscale` FROM `pazienti`";
            $result=$this->query($query);
            
            while ( $row=$result->fetch_assoc() ){
                $codFisc=$row['Codice Fiscale'];
                if ( md5($codFisc)==$encryptedCF ) {
                    $cfPatient=$codFisc;                    
                }
		}
                return $cfPatient;            
    }
    
    public function insertNewPatient($array){
        $query1="INSERT INTO `clinica`.`pazienti`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Codice Fiscale`)";
        $query2="VALUES ('".$array['name']."','".$array['surname']."','".$array['gender']."','".$array['dateBirth']."','".$array['CF']."')";
        $query=$query1." ".$query2;
        $this->query($query);
    }
    
    public function deletePatient($cf) {
        $query="DELETE FROM `pazienti` WHERE `Codice Fiscale`='".$cf."'";
        $this->query($query);
    }
    
    public function updatePatient($array,$cf){ //se modifico il codice fiscale devo modificare anche quello nella tabella visite
        $query="UPDATE `pazienti` SET `Nome`='".$array['name']."',`Cognome`='".$array['surname']."',`Sesso`='".$array['gender']."',`DataNascita`='".$array['dateBirth']."',`Codice Fiscale`='".$array['CF']."' WHERE `Codice Fiscale`='".$cf."'";
        $this->query($query);
    }
    
    
    
    
    
    
    
    
    
}

