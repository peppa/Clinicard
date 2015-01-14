<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EVisit {
    
    public $cf;
    public $dateCheck;
    public $medHistory;
    public $medExam;
    public $conclusions;
    public $toDoExam;
    public $terapy;
    public $checkup;
    
    public function __construct($cf,$dateC,$medH,$medE,$conc,$toDoE,$ter,$check) {
        $this->cf=$cf;
        $this->dateCheck=$dateC;
        $this->medHistory=$medH;
        $this->medExam=$medE;
        $this->conclusions=$conc;
        $this->toDoExam=$toDoE;
        $this->terapy=$ter;
        $this->checkup=$check;
    }
    
    public function getCF(){
        return $this->cf;
    }
    
    public function getDateCheck(){
        return $this->dateCheck;
    }
    
    public function getMedHistory(){
        return $this->medHistory;
    }
    
    public function getMedExam(){
        return $this->medExam;
    }
    
    public function getConclusions(){
        return $this->conclusions;
    }
    
    public function getToDoExam(){
        return $this->toDoExam;
    }
    
    public function getTerapy(){
        return $this->terapy;
    }
    
    public function getCheckup(){
        return $this->checkup;
    }
    
    public function toString(){
        $string=$this->cf." ".$this->dateCheck." ".$this->medHistory." ".$this->medExam." ".$this->conclusions." ".$this->toDoExam." ".$this->terapy." ".$this->checkup;
        return $string;
    }
}

