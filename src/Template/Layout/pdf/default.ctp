<?php
// inclusion de la librairie TCPDF
//http://caketuts.key-conseil.fr/index.php/2015/05/18/generer-du-pdf-sous-cakephp-v3/
    require_once ROOT . DS . 'vendor' . DS . 'tecnick.com' . DS . 'tcpdf' . DS . 'tcpdf.php'; 
    //require_once ROOT . DS . 'vendor' . DS . 'tecnick.com' . DS . 'html2pdf-4.4.0' . DS . 'html2pdf.class.php';    
 
// Cr�ation d'un document TCPDF avec les variables par d�faut
    $pdf = new TCPDF('P', 'mm', PDF_PAGE_FORMAT, TRUE, 'UTF-8', FALSE);
// Sp�cification de certains param�tres de TCPDF (i�i on sp�cifie l'auteur par d�faut)
    //$pdf->SetCreator(PDF_CREATOR);
 
// On enl�ve l'ent�te et le pied de page
    $pdf->setPrintHeader(FALSE);
    $pdf->setPrintFooter(FALSE);
 
// On sp�cifie la fonte par d�faut
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// On d�finit les marges
    $pdf->SetMargins(10, 10, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(5);
 
// On indique que le d�passement d'une page entraine automatiquement la cr�ation d'un saut de page et d'une nouvelle page
    $pdf->SetAutoPageBreak(TRUE, 5);
 
// ---------------------------------------------------------
 
// La fonte et la couleur � utiliser dans la page qui va �tre cr��e
    $pdf->SetFont('times', '', 10);
    $pdf->setColor('text', 0, 0, 0);
// On ajoute une page
    $pdf->AddPage();
    
    //$pdf->Image('images/logo_pdf.png', 15, 140, 150, 100, 'PNG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
    $pdf->Image('img/logo_pdf.png', 8, 5, 50, 20, 'PNG', 'http://www.tcpdf.org', '', false, 150, '', false, false, 1, false, false, false);
// voil� l'astuce, on r�cup�re la vue HTML cr��e par CakePHP pour alimenter notre fichier PDF
    $pdf->writeHTML($this->fetch('content'), TRUE, FALSE, TRUE, FALSE, '');
// on ferme la page
    $pdf->lastPage();
// On indique � TCPDF que le fichier doit �tre enregistr� sur le serveur ($filename �tant une variable que vous aurez pris soin de d�finir dans l'action de votre controller)
    //$pdf->Output(APP . 'files' . DS . 'pdf' . DS . $filename . '.pdf', 'F');
    //$pdf->Output(APP . 'files' . DS . 'pdf' . DS . 'index' . '.pdf', 'F');
    //$pdf->Output(APP . 'files' . DS . 'pdf' . DS . 'index' . '.pdf', 'FI');

    $pdf->Output(APP . 'files' . DS . 'pdf' . DS . $nombrepdf . '.pdf', 'I');
?>