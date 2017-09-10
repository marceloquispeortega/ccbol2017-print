<?php
require_once  ROOT. DS.  'vendor'. DS. 'gobekli'. DS. 'tcpdf' . DS . 'xtcpdf.php';

$pdf = new XTCPDF();

$pdf->setAutoPageBreak(false);

$pdf->setTitulo('Impresión de Credenciales');

$pdf->AddPage();
$pdf->SetY(15);

// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => false,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

$pdf->SetFont('dejavusans', '', 9);

$i = 0;
//echo debug($lastUsers->toArray());
$y = $pdf->GetY() + 8;
foreach($lastUsers as $user) {
    $i++;
    $x = ($i % 2 == 0)?130:40;
    $pdf->MultiCell(60, 6, $user->name, 1, 'C', 0, 1, $x, $y, 1, '', '', '', 6, 'M');
    $pdf->MultiCell(60, 6, $user->last_name, 1, 'C', 0, 1, $x, '', 1, '', '', '', 6, 'M');
    $pdf->SetFont('dejavusans', 'B', 9);
    $pdf->MultiCell(60, 6, 'PARTICIPANTE', 1, 'C', 0, 1, $x, '', 1, '', '', '', 6, 'M');
    $pdf->SetFont('dejavusans', '', 9);
    $pdf->MultiCell(60, 6, $user->city, 1, 'C', 0, 1, $x, '', 1, '', '', '', 6, 'M');
    $strpos = strpos($user->info, ')');
    if ($strpos) {
        $user->info = substr($user->info, 0, $strpos + 1);
    }
    $pdf->MultiCell(60, 6, $user->info, 1, 'C', 0, 1, $x, '', 1, '', '', '', 6, 'M');
    $pdf->write1DBarcode(intval($user->id), 'C128', $x + 13, '', '', 10, 0.4, $style, 'N');

    if ($i % 2 == 0) {
        $y = $pdf->GetY() + 15;
    } else {
        $pdf->SetY($y);
    }
}
/*$pdf->MultiCell('', 6, strtoupper($meses[$params['mes']]) . ' ' . $params['gestion'] . ' MENSUAL', '', 'C', '', 1, '', '', 1, '', '', '', 6, 'M');

$pdf->SetY($pdf->GetY() + 5);
$pdf->SetFont('dejavusans', 'B', 6);
$pdf->MultiCell(15, 6, '#', 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(40, 6, 'CATEGORÍA', 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(30, 6, 'USUARIOS', 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(30, 6, 'CONSUMO M3', 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(35, 6, "IMPORTE CONSUMO\nAGUA", 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(35, 6, "IMPORTE CONSUMO\nALCANTARILLADO", 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(30, 6, 'DESCUENTO DE LEY', 1, 'C', 1, '', '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell(44, 6, 'IMPORTE TOTAL', 1, 'C', 1, 1, '', '', 1, '', '', '', 6, 'M');

$i = $usuarios = $consumo = $agua = $alcantarillado = $descuentos = $importe_total = 0;
foreach ($categorias as $categoria_id => $categoria_nombre) {
    $i++;
    $usuarios += empty($mensual[$categoria_id]['usuarios'])?0:$mensual[$categoria_id]['usuarios'];
    $consumo += empty($mensual[$categoria_id]['consumo'])?0:$mensual[$categoria_id]['consumo'];
    $agua += empty($mensual[$categoria_id]['agua'])?0:$mensual[$categoria_id]['agua'];
    $alcantarillado += empty($mensual[$categoria_id]['alcantarillado'])?0:$mensual[$categoria_id]['alcantarillado'];
    $descuentos += empty($mensual[$categoria_id]['descuentos'])?0:$mensual[$categoria_id]['descuentos'];
    $importe_total += empty($mensual[$categoria_id]['importe_total'])?0:$mensual[$categoria_id]['importe_total'];

    $pdf->SetFont('dejavusans', '', 7);
    $pdf->MultiCell(15, 8, $i, 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(40, 8, $categoria_nombre, 1, 'L', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(30, 8, empty($mensual[$categoria_id]['usuarios'])?0:number_format($mensual[$categoria_id]['usuarios']), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(30, 8, empty($mensual[$categoria_id]['consumo'])?0:number_format($mensual[$categoria_id]['consumo']), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(35, 8, empty($mensual[$categoria_id]['agua'])?'0.00':number_format($mensual[$categoria_id]['agua'], 2), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(35, 8, empty($mensual[$categoria_id]['alcantarillado'])?'0.00':number_format($mensual[$categoria_id]['alcantarillado'], 2), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(30, 8, empty($mensual[$categoria_id]['descuentos'])?'0.00':number_format($mensual[$categoria_id]['descuentos'], 2), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
    $pdf->MultiCell(44, 8, empty($mensual[$categoria_id]['importe_total'])?'0.00':number_format($mensual[$categoria_id]['importe_total'], 2), 1, 'R', '', 1, '', '', 1, '', '', '', 8, 'M');
}
$pdf->SetFont('dejavusans', 'B', 7);
$pdf->MultiCell(15, 8, '', '', 'R', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(40, 8, 'TOTAL', 1, 'L', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(30, 8, number_format($usuarios), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(30, 8, number_format($consumo), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(35, 8, number_format($agua, 2), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(35, 8, number_format($alcantarillado, 2), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(30, 8, number_format($descuentos, 2), 1, 'R', '', '', '', '', 1, '', '', '', 8, 'M');
$pdf->MultiCell(44, 8, number_format($importe_total, 2), 1, 'R', '', 1, '', '', 1, '', '', '', 8, 'M');
*/

$script = "print();";
$pdf->IncludeJS($script);
$pdf->Output('impresion_credenciales_' . time() . '.pdf', 'I');
