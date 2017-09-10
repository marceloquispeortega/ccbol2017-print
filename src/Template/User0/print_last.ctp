<?php
require_once  ROOT. DS.  'vendor'. DS. 'gobekli'. DS. 'tcpdf' . DS . 'xtcpdf.php';

$pdf = new XTCPDF();

$pdf->setAutoPageBreak(false);

$pdf->setTitulo('Impresión de Credenciales');

$pdf->AddPage();
$pdf->SetY(15);

$pdf->SetFont('dejavusans', 'B', 9);

55, 90
$pdf->MultiCell('', 6, 'EMPRESA DE AGUA POTABLE Y ALCANTARILLADO SUCRE', '', 'C', '', 1, '', '', 1, '', '', '', 6, 'M');
$pdf->MultiCell('', 6, 'ESTADÍSTICA DE FACTURACIÓN', '', 'C', '', 1, '', '', 1, '', '', '', 6, 'M');
$pdf->SetFont('dejavusans', 'BU', 9);
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

$pdf->Output('estadisticas_facturacion_.pdf', 'I');
