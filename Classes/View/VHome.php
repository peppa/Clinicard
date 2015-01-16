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
    public function getServicesContent(){
        $body=$this->fetch('services.tpl');
        return $this->makeContentArray($body);
    }
    
    //questo va messo in una VContact con relativo controllore o è statica e la lasciamo qua?
    public function getContactsContent(){
        $body=$this->fetch('contact.tpl');
        return $this->makeContentArray($body);
    }
    

}