<?php 


class CPatientsDB{

    /**
     *Contiene tutti i pazienti nel DB
     * cambiare nome in Paztients ?
     * non usato più
     * 
     * @var type array
     */
    //public $Pazienti=array();
    
    /**
     *Contiene tutte le visite nel DB
     * cambiare nome in Visits ?
     * non usato più
     * 
     * @var type array
     */
    //public $Visite=array();
    
    private $bodyHTML;

    
    /**
     *
     */
	public function __construct(){ 
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		$this->fillArrays();

		$action=$VPatientsDB->get('action');
		switch($action) {

			case 'insert':
			$this->insertPatient();
			break;

			case 'search':
			$this->searchPatient();
			break;

			case 'getFullData':
			$this->showPatientDetails();
			break;
                    
                        case 'getChecks':
                            $this->showPatientChecks();
                        break;

			case 'printReport':
			$this->printReport();
			break;

			case 'modPat':
                            $this->modifyPatient();
			break;
                    
                        case 'modCheck':
                            $this->modifyCheck();
                        break;

			case 'delPat':
                            $this->deletePatient();
			break;
                    
                        case 'delCheck':
                            $this->deleteCheck();
			break;
                    
                        case 'newVisit':
                            $this->newVisit();
                        break;

			default:
                            $this->getHomePatients();   
		}

	}

        /**
         * Crea un'istanza di EPatient ed Evisit per ogni paziente e visita che sono nel database
         */
        private function fillArrays(){ // va cambiato nome
            $FPatient=  USingleton::getInstance('FPatient');
            $FCheckup=  USingleton::getInstance('FCheckup');
            
            //$this->Pazienti=$FPatient->fillPatientsArray($this->Pazienti);
            
            $FPatient->fillPatientsArray(); //creare tutte le entity in CHome ? altrimenti vengono create solamente quando si accede
                                            //alla sezione DB
                
            for ( $i=0; $i<count(EPatient::$istances); $i++){
                //$this->Visite=$FCheckup->fillCheckupsArray($this->Visite,$this->Pazienti[$i]->getCf() );
                $FCheckup->fillCheckupsArray(EPatient::$istances[$i]->getCF());
            }
        }
        
    /**
     * Cerca tutti i pazienti che stanno nel DB e li mette in array che passa alla view per essere stampato
     */    
    private function getHomePatients(){ // OKv3
        $VPatientsDB=Usingleton::getInstance('VPatientsDB');
        
                for ( $i=0; $i<count(EPatient::$istances); $i++){
                    $name=EPatient::$istances[$i]->getName();
                    $surname=EPatient::$istances[$i]->getSurname();
                    $dateB=EPatient::$istances[$i]->getDataN();
                    $cf=EPatient::$istances[$i]->getCF();
                    $gender=EPatient::$istances[$i]->getSex();
                    $Patients[$i]=array('name'=>$name,'surname'=>$surname,'cf'=>$cf,'dateBirth'=>$dateB,'gender'=>$gender,'link'=>md5($cf));
                }
                $this->bodyHTML=$VPatientsDB->fetchHomePatients($Patients);
    }

    /**
     * Inserisce una nuova voce sia nella tabella pazienti che in quella visite
     * (non si può aggiungere un paziente senza una visita)
     */
	private function insertPatient(){ //OKv3
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		if( $VPatientsDB->get('sent') ){
                    $FPatient=  USingleton::getInstance('FPatient');
                    $FCheckup=  USingleton::getInstance('FCheckup');
                    debug($VPatientsDB->get('gender'));
                    
                    $arrayPatient=array('name'=>$VPatientsDB->get('name'),
                                        'surname'=>$VPatientsDB->get('surname'),
				        'gender'=>$VPatientsDB->get('gender'),
				        'dateBirth'=>$VPatientsDB->get('dateBirth'),
				        'CF'=>strtoupper($VPatientsDB->get('CF')));
                    
		    $arrayCheck=array('CF'=>$VPatientsDB->get('CF'),
                                      'dateCheck'=>$VPatientsDB->get('dateCheck'),
			 	      'medHistory'=>$VPatientsDB->get('medHistory'),
			 	      'medExam'=>$VPatientsDB->get('medExam'),
				      'conclusions'=>$VPatientsDB->get('conclusions'),
				      'toDoExams'=>$VPatientsDB->get('toDoExams'),
				      'terapy'=>$VPatientsDB->get('terapy'),
				      'checkup'=>$VPatientsDB->get('checkup'));
                    
                    $FPatient->insertNewPatient($arrayPatient);
                    $FCheckup->insertNewCheckup($arrayCheck);
                    $message="Inserimento avvenuto con successo";
                    $this->bodyHTML=$VPatientsDB->showInfoMessage($message,true);
		}
		else {
                    $this->bodyHTML=$VPatientsDB->showInsertForm();			
		}	
	}

        /**
         * La ricerca avviene per nome, cognome o codice fiscale, a seconda di cosa viene inserito nel campo cerca
         */
	private function searchPatient(){ //OKv3
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
                
		if($VPatientsDB->get('keyValue')==null) {
                    $this->bodyHTML=$VPatientsDB->fetchSerachForm();
		}
		else {
                    $FPatient=  USingleton::getInstance('FPatient');
		    $searchKey=$VPatientsDB->get('keyValue');
                    
                    $searchResult=$FPatient->findPatient($searchKey);
                    $numResults=count($searchResult);
                    if ( $numResults!=0 ) {
                            $message="la ricerca ha prodotto ".$numResults." risultato/i";
                            $this->bodyHTML=$VPatientsDB->getSearchResult($message,$searchResult,$numResults);
                    }
                    else {
                            $message="La ricerca non ha prodotto nessun risultato";
                            $this->bodyHTML=$VPatientsDB->getErrorMessage($message);
                    }
	    }
	}

        /**
         * Visualizza i dettagli di una visita di un paziente
         */
	private function showPatientDetails(){ //OKv2
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
                //$FPatient=  USingleton::getInstance('FPatient');
		$encCF=$VPatientsDB->get('p');
                $encCheck=$VPatientsDB->get('ch');
                
                $patientDetail=$this->buildInfoArray($encCF,$encCheck);
                $this->bodyHTML=$VPatientsDB->getPatientDetail($patientDetail);
	}
        
        /**
         * Mette insieme i dati recuperati dall'Entity Pazienti e da quella Visite in un unico array che poi viene 
         * passato alla view per stamparlo. Utilizzata sia da showPatientDetails che da printReport
         * 
         * @param type $encryptedCF Codice fiscale preso dalla view
         * @param type $encryptedDateCheck Data della visita presa dalla view
         * @return type array
         */
        public function buildInfoArray($encryptedCF,$encryptedDateCheck){ //OKv3
            $posCF=$this->getCfPosition($encryptedCF);
            $cfPatient=  EPatient::$istances[$posCF]->getCF();
            
            $posCH=$this->getDateCheckPosition($encryptedDateCheck,$encryptedCF);
            //$dateCH=$this->Visite[$cfPatient][$posCH]->getDateCheck();
            
            $array=array('name'=>  EPatient::$istances[$posCF]->getName(),
                         'surname'=>EPatient::$istances[$posCF]->getSurname(),
                         'gender'=>EPatient::$istances[$posCF]->getSex(),
                         'dateBirth'=>EPatient::$istances[$posCF]->getDataN(),
                         'CF'=>EPatient::$istances[$posCF]->getCF(),
                         'dateCheck'=>  EVisit::$istances[$posCH]->getDateCheck(),
                         'medHistory'=> EVisit::$istances[$posCH]->getMedHistory(),
                         'medExam'=>EVisit::$istances[$posCH]->getMedExam(),
                         'conclusions'=> EVisit::$istances[$posCH]->getConclusions(),
                         'toDoExams'=> EVisit::$istances[$posCH]->getToDoExam(),
                         'terapy'=> EVisit::$istances[$posCH]->getTerapy(),
                         'checkup'=> EVisit::$istances[$posCH]->getCheckup());
            return $array;
        }
        
        /**
         * Mostra tutte le visite fatte da un paziente
         */
        public function showPatientChecks(){ //OKv3
            $VPatientsDB=Usingleton::getInstance('VPatientsDB');
            //$FPatient=  USingleton::getInstance('FPatient');
            
            $encCF=$VPatientsDB->get('p');            
            $posCF=$this->getCfPosition($encCF);
            
            $cfPatient=EPatient::$istances[$posCF]->getCF();
            $name=EPatient::$istances[$posCF]->getName();
            $surname=EPatient::$istances[$posCF]->getSurname();
            
            for ( $i=0;$i<count(EVisit::$istances);$i++ ){
                if ( EVisit::$istances[$i]->getCF()==$cfPatient ){
                    $patChecks[]=EVisit::$istances[$i]->getDateCheck(); //tutte le date delle visite del paziente
                }
            }
            
            $this->bodyHTML=$VPatientsDB->getPatientChecks($name,$surname,$patChecks,$encCF);
        }


        /**
         * Stampa il report di una visita di un paziente
         */
	private function printReport(){ //OKv3
		$VPatientsDB=USingleton::getInstance('VPatientsDB');
                $encCF=$VPatientsDB->get('pat');
                $encCH=$VPatientsDB->get('ch');
                
		if ( $VPatientsDB->get('fields')=="sent" ){
                    $Updf=USingleton::getInstance('Updf');
                    $patArray=$this->buildInfoArray($encCF, $encCH);
                    $patInfo=$patArray['name']." ".$patArray['surname'].", ".$patArray['dateBirth']." \n".$patArray['CF'];
                    //$arrayToPrint=array();
                    
                    foreach ($patArray as $key=>$value) {
                        if ( $VPatientsDB->get($key) ) {
                            $arrayPrint[$key]=$value;                            
                        }
                    }
                    $Updf->printPage($patInfo,$arrayPrint);
		}
		else {
                    $this->bodyHTML=$VPatientsDB->getReportFields($encCF,$encCH);			
		}
	}


        /**
         * Modifica i dati di un paziente
         */
	private function modifyPatient() { //OKv3
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            $encCF=$VPatientsDB->get('p');
            
            $posCF=$this->getCfPosition($encCF);
            $cfPatient= EPatient::$istances[$posCF]->getCF();
            
            if ( $VPatientsDB->get('mod')=="completed" ){
                $FPatient=  USingleton::getInstance('FPatient');
                
                $arrayPatient=array('name'=>$VPatientsDB->get('name'),
                                    'surname'=>$VPatientsDB->get('surname'),
				    'gender'=>$VPatientsDB->get('gender'),
				    'dateBirth'=>$VPatientsDB->get('dateBirth'),
				    'CF'=>strtoupper($VPatientsDB->get('CF')));
                
                if ( $arrayPatient['CF']!=$cfPatient ){ //se modifico il codice fiscale devo modificare anche quello nella tabella visite
                    $FCheckup=  USingleton::getInstance('FCheckup');
                    $FCheckup->updateCheckCF($arrayPatient['CF'],$cfPatient);
                }
                
                $FPatient->updatePatient($arrayPatient,$cfPatient);
                $message="modifica completata con successo";
                $this->bodyHTML=$VPatientsDB->showInfoMessage($message,true);
            }
            else {
                $this->bodyHTML=$VPatientsDB->getPatientModPage($cfPatient);
            }
	}
        
        /**
         * Modifica una visita di un paziente
         */
        public function modifyCheck(){//OKv3
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            $encCF=$VPatientsDB->get('p');
            $encCH=$VPatientsDB->get('ch');
            
            $posCF=$this->getCfPosition($encCF);
            $PatientInfo=array("CF"=>  EPatient::$istances[$posCF]->getCF(),
                               "name"=>EPatient::$istances[$posCF]->getName(),
                               "surname"=>EPatient::$istances[$posCF]->getSurname() );
            
            $posCH=$this->getDateCheckPosition($encCH,$encCF);
            $dateCH=  EVisit::$istances[$posCH]->getDateCheck();
            
            if ( $VPatientsDB->get('mod')=="completed" ){
                $FCheckup=  USingleton::getInstance('FCheckup');
                
                $arrayCheck=array('dateCheck'=>$VPatientsDB->get('dateCheck'),
			 	  'medHistory'=>$VPatientsDB->get('medHistory'),
			 	  'medExam'=>$VPatientsDB->get('medExam'),
				  'conclusions'=>$VPatientsDB->get('conclusions'),
				  'toDoExams'=>$VPatientsDB->get('toDoExams'),
				  'terapy'=>$VPatientsDB->get('terapy'),
				  'checkup'=>$VPatientsDB->get('checkup'));
                
                $FCheckup->UpdateCheck($arrayCheck,$PatientInfo['CF'],$dateCH);
                $message="modifica completata con successo";
                $this->bodyHTML=$VPatientsDB->showInfoMessage($message,true);
            }
            else {
                $this->bodyHTML=$VPatientsDB->getCheckModPage($PatientInfo,$dateCH);
            }
            
        }

        /**
         * cancella un paziente (e tutte le sue visite) dal DB
         */
	private function deletePatient(){
            $VPatientsDB=USingleton::getInstance('VPatientsDB');
            $encCF=$VPatientsDB->get('p');
            
            $posCF=$this->getCfPosition($encCF);
            $cfPatient=EPatient::$istances[$posCF]->getCF();
            
                
                if ( $VPatientsDB->get('conf')=="yes" ){
                    $FPatient=USingleton::getInstance('FPatient');
                    $FCheckup=  USingleton::getInstance('FCheckup');
                    
                    $FPatient->deletePatient($cfPatient);
                    $FCheckup->deleteCheckup($cfPatient,"all"); //oltre al paziente cancello anche tutte le sue visite
                    $message="eliminazione completata con successo";
                    $this->bodyHTML=$VPatientsDB->showInfoMessage($message,true);
                }
                else {
                    $this->bodyHTML=$VPatientsDB->showPatientConfirmPage($cfPatient);
                }
		}
                
        /**
         * cancella una sola visita di un paziente dal DB. Se la visita cancellata è l'unica che il 
         * paziente ha, allora viene cancellato anche il paziente
         */
        public function deleteCheck(){ //OKv3
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            $encCF=$VPatientsDB->get('p');
            $encCH=$VPatientsDB->get('ch');
            
            $posCF=$this->getCfPosition($encCF);
            $cfPatient=  EPatient::$istances[$posCF]->getCF();
            
            $posCH=$this->getDateCheckPosition($encCH,$encCF);
            $dateCH=  EVisit::$istances[$posCH]->getDateCheck();
            
            if ( $VPatientsDB->get('conf')=="yes" ){
                $FCheckup=  USingleton::getInstance('FCheckup');
            
                $numVisits=$this->checkNumVisit($cfPatient);
                //scrivere funzione che cicla su tutte le istanze di EVisit per controllare se un paziente ne ha solo una
                if ($numVisits==1){ //Se viene cancellata l'unica visita del paziente viene cancellato anche il paziente stesso
                    $FPatient=  USingleton::getInstance('FPatient');
                    $FPatient->deletePatient($cfPatient);
                }
                else {
                    $FCheckup->deleteCheckup($cfPatient,$dateCH);
                }
                $message="eliminazione completata con successo";
                $this->bodyHTML=$VPatientsDB->showInfoMessage($message,true);
            }
            else {
                $this->bodyHTML=$VPatientsDB->showCheckConfirmPage($cfPatient,$dateCH);
            }
            
        }
                
        /**
         * Aggiunge una nuova visita alla lista delle visite di un paziente
         */
        public function newVisit(){ //OKv3
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            $FCheckup=  USingleton::getInstance('FCheckup');            
            $encCF=$VPatientsDB->get('p');
            
            $posCF=$this->getCfPosition($encCF);
            $cfPatient=EPatient::$istances[$posCF]->getCF();
            $name=EPatient::$istances[$posCF]->getName();
            $surname=EPatient::$istances[$posCF]->getSurname();
            
            if ( $VPatientsDB->get('sent')=="y"){              
                
                $arrayCheck=array('CF'=>EPatient::$istances[$posCF]->getCF(),
                                  'dateCheck'=>$VPatientsDB->get('dateCheck'),
			 	  'medHistory'=>$VPatientsDB->get('medHistory'),
			 	  'medExam'=>$VPatientsDB->get('medExam'),
				  'conclusions'=>$VPatientsDB->get('conclusions'),
				  'toDoExams'=>$VPatientsDB->get('toDoExams'),
				  'terapy'=>$VPatientsDB->get('terapy'),
				  'checkup'=>$VPatientsDB->get('checkup'));
                
                $FCheckup->insertNewCheckup($arrayCheck);
                
                $message="inserimento avvenuto con successo";
                $this->bodyHTML=$VPatientsDB->showInfoMessage($message,true);                
            }
            else {
                $this->bodyHTML=$VPatientsDB->showCheckForm($cfPatient,$name,$surname);                
            }
        }
        
        
        public function getBody() {
            return $this->bodyHTML;            
        }
        
        /**
         * restituisce l'indice dell'oggetto di tipo EPatient che appartiene all'array istances
         * 
         * @param type $encryptedCF stringa md5 del cf del paziente
         * @return int indice del paziente nell'array istances
         */
        public function getCfPosition($encryptedCF){
            
            for ( $i=0; $i<count(EPatient::$istances);$i++ ){ 
                if ( md5(EPatient::$istances[$i]->getCF() )==$encryptedCF ) {
                    $position=$i;
                    }                
                }
                return $position;
        }
        
        /**
         * restituisce l'indice dell'oggetto di tipo EVisit che appartiene all'array istances
         * 
         * @param type $encryptedDateCheck stringa md5 della date della visita del paziente
         * @param type $encryptedCF stringa md5 del cf del paziente
         * @return int indice del paziente nell'array istances
         */
        public function getDateCheckPosition($encryptedDateCheck,$encryptedCF){
            for ( $i=0;$i<count(EVisit::$istances);$i++ ){
                if ( md5(EVisit::$istances[$i]->getCF()==$encryptedCF) && md5(EVisit::$istances[$i]->getDateCheck())==$encryptedDateCheck ) {
                    $position=$i;
                }
            }
            return $position;
        }
        
        public function checkNumVisit($cfPat){
            $numVisits=0;
            for ($i=0;$i<count(EVisit::$istances);$i++){
                if ( EVisit::$istances[$i]->getCF()==$cfPat ){
                    $numVisits++;
                }
            }
            return $numVisits;
        }
        
        public function manageData(){
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            $encCF=$VPatientsDB->get('pat');
            
            $posCF=$this->getCfPosition($encCF);
            $cf=  EPatient::$istances[$posCF]->getCF();
            $name=EPatient::$istances[$posCF]->getName();
            $surname=EPatient::$istances[$posCF]->getSurname();
            $dateB=EPatient::$istances[$posCF]->getDataN();
            $values=array("Name"=>$name,"Surname"=>$surname,"CF"=>$cf,"DateB"=>$dateB);
            echo json_encode($values);
        }
                
                
                
                
                
                
                
                
                
                
                
                
                
}




