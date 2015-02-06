<?php 

//require_once "./Configuration files/DBConfiguration.php";

class FDatabase extends mysqli{

	public function __construct(){
		global $config;
		parent::__construct($config['mysql']['host'],$config['mysql']['user'],$config['mysql']['password'],$config['mysql']['database']);
		
                /* check DB connection */
                if ($this->connect_errno) {
                    debug("Error reaching DB: ".$this->connect_error);
                }else{
                    debug("DB Connection estabilished successfully");
                }

	}
        
        //override to add debug function
        public function query($passedQuery,$resultmode=NULL){
                $result=parent::query($passedQuery, $resultmode);
                debug($passedQuery);
                debug($this->error);
                debug('Numero risultati: '.$this->affected_rows);
		return $result;
	}
        
        //da eliminare assolutamente!!! fa schifo
        public function getDocUsername(){
            $query="SELECT `Username` FROM `utenti` WHERE `Medico`=1";
            $result=$this->query($query);
            $row=$result->fetch_assoc();
            $name=$row['Username'];
            return $name;
        }
        
        /**
	 * function associativeArrayQuery
	 * 
	 * Performs a query on the database, returns an associative array containing the results of the query.
	 * 
	 * @param string $q Contains the query to be sended to the database.
	 * @return mixed On success : an associative array that contains all the rows of the query's result. On failure : false.
	 */
	public function QueryAssociativeArray($q)
	{
		$result = $this->query($q); 
		
		if ($result!=false) // on query success 
		{
			if($result->num_rows != 0) // if there's at least one row result.
			{
				while ($row = $result->fetch_assoc())  
				{
					$returnArray[] = $row; 
				}
			}
			else // if the query returned an empty result
				$returnArray = array(); // creates an empty array and returns it.
		}
		else // on query failure
		{
			$returnArray = false; 
		}
		
		return $returnArray;
	}



}