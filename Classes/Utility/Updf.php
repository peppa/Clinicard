<?php

//require("./Libs/fpdf/fpdf.php");

class Updf extends fpdf {

	function Header(){
		$title="ASL 01 - Avezzano-Sulmona-L'Aquila \n P.O. San Salvatore - L'Aquila \n U.O.C. Pneumologia \n Dott. Paolo Carducci";
		$this->SetFont('Arial','',11);
		$this->MultiCell(0,5,$title,0,'C');
		$this->Ln(10);
	}

	function Footer(){
		$this->SetY(-15); //prints pageNo at the bottom
		$this->SetFont('Arial','I',8);
		$this->SetTextColor(128);
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
	}

	function patientInfo($string){
		$this->SetFont('Arial','',11);
		$this->MultiCell(0,5,$string,0,'L');
		$this->Ln(10);
	}

	function fieldTitle($title){
		$newTitle=$this->transformText($title); //translates in italian and makes it upper case
		$this->SetFont('Arial','B',11);
		$this->Cell(0,5,$newTitle,0,1,'L',false);
	}

	function fieldBody($body){
		$this->SetFont('Arial','',11);
		$this->MultiCell(0,5,$body,0,'L');
		$this->Ln(10);
	}

	function printField($title,$body){
		$this->fieldTitle($title);
		$this->fieldBody($body);
	}

	function printPage($string1,$arrayInfo){
		$this->AddPage();
		$this->patientInfo($string1);
		foreach ( $arrayInfo as $key=>$value ) {
			$this->printField($key,$value);
		}
	    $this->Output();
	}

	function transformText($string){

		switch ($string){

			case 'dateCheck': $title='data della visita';
			break;

			case 'medHistory': $title='anamnesi';
			break;

			case 'medExam': $title='esame obiettivo';
			break;

			case 'conclusions': $title='conclusioni';
			break;

			case 'toDoExams': $title='esami prescritti';
			break;

			case 'terapy': $title='terapia';
			break;

			case 'checkup': $title='controllo';
			break;
		}
		$title=strtoupper($title);
		return $title;
	}


}