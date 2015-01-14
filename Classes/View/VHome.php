<?php


class VHome extends View {
	
    public function getHomeBody(){
    	$body=$this->fetch('body_home.tpl');
    	return$body;
    }
    
    public function showUser($user){
        $this->assign('username',$user);
    }
    
    
    //questo va messo in una Vservice con relativo controllore o è statica e la lasciamo qua?
    public function getServicesBody(){
        $about=$this->fetch('services.tpl');
        return $about;
    }
    
    //questo va messo in una VContact con relativo controllore o è statica e la lasciamo qua?
    public function getContactsBody(){
        $about=$this->fetch('contact.tpl');
        return $about;
    }

}