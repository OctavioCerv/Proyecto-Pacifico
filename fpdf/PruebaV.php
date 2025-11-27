<?php

session_start();
require('./fpdf.php');

class PDF extends FPDF
{
   function Header()
   {
      
      $this->SetFont('Arial', 'B', 25);
      $this->Cell(95);
      $this->SetTextColor(0, 0, 0);
      $this->Cell(110, 15, utf8_decode('HOTEL EL PACIFICO'), 1, 1, 'C', 0);
      $this->Ln(3);
      $this->SetTextColor(103);

      $this->Cell(180);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Dubai"), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(180);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 8713813348"), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(180);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : ThePacificHotel@gmail.com"), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(180);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : Dubai"), 0, 0, '', 0);
      $this->Ln(10);

      $this->SetTextColor(0, 0, 0);
      $this->Cell(100);
      $this->SetFont('Arial', 'B', 25);
      $this->Cell(100, 10, utf8_decode("HABITACIONES RESERVADAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      $this->SetFillColor(0, 0, 255);
      $this->SetTextColor(255, 255, 255);
      $this->SetDrawColor(163, 163, 163);
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Personas'), 1, 0, 'C', 1);
      $this->Cell(85, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Total + IVA'), 1, 1, 'C', 1);

            // Customer details
      // $nom_user = $_POST["username"];
      
      // $this->SetFont('Arial','B',12);
      // $this->Cell(0,10,'ENVIAR A',0,0,'L');
      // $this->SetX(140);
      // $this->Cell(0,10,'Datos de pedido',0,0,'R');
      // $this->Ln();
      // $this->SetFont('Arial','',12);
      // $this->Cell(0,10,"username: $nom_user",0,0,'L');
      // $this->SetX(140);
      // $this->Ln();
      // $this->SetX(140);
      // $this->SetFont('Arial','',12);
    
}


   function Footer()
   {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C');

      
   }
}

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

$selectedRoomName = $_SESSION['roomName'];
$selectedRoomType = $_SESSION['roomType'];
$selectedRoomPrice = $_SESSION['roomPrice'];
$selectedRoomNumPeople = $_SESSION['roomPersons'];
$checkInDate = $_SESSION['checkInDate'];
$checkOutDate = $_SESSION['checkOutDate'];

$precioConIva = $selectedRoomPrice * 1.16;

$pdf->Cell(30, 10, utf8_decode($i + 1), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($selectedRoomName), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($selectedRoomType), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($selectedRoomNumPeople), 1, 0, 'C', 0);
$pdf->Cell(85, 10, utf8_decode($selectedRoomPrice), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($precioConIva), 1, 1, 'C', 0);
$pdf->Ln(10);


$pdf->Output('Prueba2.pdf', 'I');
?>