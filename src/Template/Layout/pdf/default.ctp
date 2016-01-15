<?php
// inclusion de la librairie TCPDF
//http://caketuts.key-conseil.fr/index.php/2015/05/18/generer-du-pdf-sous-cakephp-v3/
    require_once ROOT . DS . 'vendor' . DS . 'tecnick.com' . DS . 'tcpdf' . DS . 'tcpdf.php'; 
    //require_once ROOT . DS . 'vendor' . DS . 'tecnick.com' . DS . 'html2pdf-4.4.0' . DS . 'html2pdf.class.php';    
 
// Création d'un document TCPDF avec les variables par défaut
    $pdf = new TCPDF('P', 'mm', PDF_PAGE_FORMAT, TRUE, 'UTF-8', FALSE);
// Spécification de certains paramètres de TCPDF (içi on spécifie l'auteur par défaut)
    //$pdf->SetCreator(PDF_CREATOR);
 
// On enlève l'entête et le pied de page
    $pdf->setPrintHeader(FALSE);
    $pdf->setPrintFooter(FALSE);
 
// On spécifie la fonte par défaut
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// On définit les marges
    $pdf->SetMargins(10, 10, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(5);
 
// On indique que le dépassement d'une page entraine automatiquement la création d'un saut de page et d'une nouvelle page
    $pdf->SetAutoPageBreak(TRUE, 5);
 
// ---------------------------------------------------------
 
// La fonte et la couleur à utiliser dans la page qui va être créée
    $pdf->SetFont('times', '', 10);
    $pdf->setColor('text', 0, 0, 0);
// On ajoute une page
    $pdf->AddPage();
    
    //$pdf->Image('images/logo_pdf.png', 15, 140, 150, 100, 'PNG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
    $pdf->Image('img/logo_pdf.png', 8, 5, 50, 20, 'PNG', 'http://www.tcpdf.org', '', false, 150, '', false, false, 1, false, false, false);
// voilà l'astuce, on récupère la vue HTML créée par CakePHP pour alimenter notre fichier PDF
    $pdf->writeHTML($this->fetch('content'), TRUE, FALSE, TRUE, FALSE, '');
// on ferme la page
    $pdf->lastPage();
// On indique à TCPDF que le fichier doit être enregistré sur le serveur ($filename étant une variable que vous aurez pris soin de définir dans l'action de votre controller)
    //$pdf->Output(APP . 'files' . DS . 'pdf' . DS . $filename . '.pdf', 'F');
    //$pdf->Output(APP . 'files' . DS . 'pdf' . DS . 'index' . '.pdf', 'F');
    //$pdf->Output(APP . 'files' . DS . 'pdf' . DS . 'index' . '.pdf', 'FI');

    $pdf->Output(APP . 'files' . DS . 'pdf' . DS . $nombrepdf . '.pdf', 'I');
?>