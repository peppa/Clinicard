<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EPatient {
    public $nome;
    public $cognome;
    public $cf;
    public $dataN;
    public $sex;
    
    public function __construct($n,$c,$cf,$d,$s){
        $this->nome=$n;
        $this->cognome=$c;
        $this->cf=$cf;
        $this->dataN=$d;
        $this->sex=$s;
    }
    
    public function getName(){
        return $this->nome;
    }
    
    public function getSurname(){
        return $this->cognome;
    }
    
    public function getCF(){
        return $this->cf;
    }
    
    public function getDataN(){
        return $this->dataN;
    }
    
    public function getSex(){
        return $this->sex;
    }
    
    public function toString(){
        $string=$this->nome." ".$this->cognome." ".$this->cf." ".$this->dataN." ".$this->sex;
        return $string;
    }
    
}
