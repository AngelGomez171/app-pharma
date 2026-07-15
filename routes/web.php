<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


Route::get('/categorias', function () {

    $categorias = json_decode(json_encode([
        ["codigo" => "A02", "categoria" => "Medicamentos para el tratamiento de Trastornos causados por Ácidos"],
        ["codigo" => "A03", "categoria" => "Medicamentos contra Trastornos Funcionales Gastrointestinales"],
        ["codigo" => "A04", "categoria" => "Medicamentos Antieméticos y Antinauseosos"],
        ["codigo" => "A06", "categoria" => "Medicamentos para el Estreñimiento"],
        ["codigo" => "A07", "categoria" => "Medicamentos Antidiarreicos, Antiinflamatorios y Antiinfecciosos Intestinales"],
        ["codigo" => "A10", "categoria" => "Medicamentos usados en Diabetes"],
        ["codigo" => "A11", "categoria" => "Vitaminas"],
        ["codigo" => "A12", "categoria" => "Suplementos Minerales"],
    ]));

    $html = "<h1>Categorías</h1>";
    $html .= "<table border='1' cellpadding='8' cellspacing='0'>";
    $html .= "<tr><th>Código</th><th>Categoría</th></tr>";

    foreach ($categorias as $cat) {
        $html .= "<tr><td>$cat->codigo</td><td>$cat->categoria</td></tr>";
    }

    $html .= "</table>";

    return $html;
});

Route::get('/medicamentos', function () {

    $medicamentos = json_decode(json_encode([
        ["codigo" => "A02BA02", "no" => 1, "nombre" => "Ranitidina", "dosis" => "50 mg", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A02BA03", "no" => 2, "nombre" => "Famotidina", "dosis" => "40 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "no" => 3, "nombre" => "Omeprazol", "dosis" => "20 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "no" => 4, "nombre" => "Omeprazol", "dosis" => "40 mg", "forma" => "Sólidos parenterales", "via" => "IV"],
        ["codigo" => "A03BA01", "no" => 1, "nombre" => "Atropina (Sulfato)", "dosis" => "0.5–1 mg/mL", "forma" => "Líquidos parenterales", "via" => "SC/IM/IV"],
        ["codigo" => "A03BA03", "no" => 2, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A03BA03", "no" => 3, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "20 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "no" => 4, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "5 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "no" => 5, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "no" => 1, "nombre" => "Ondansetron", "dosis" => "8 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "no" => 2, "nombre" => "Ondansetron", "dosis" => "2 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "A04AA02", "no" => 3, "nombre" => "Granisetron", "dosis" => "1 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA02", "no" => 4, "nombre" => "Granisetron", "dosis" => "1 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "R06AA11", "no" => 5, "nombre" => "Dimenhidrinato", "dosis" => "50 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "R06AA11", "no" => 6, "nombre" => "Dimenhidrinato", "dosis" => "50 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
    ]));

    $html = "<h1>Medicamentos</h1>";
    $html .= "<table border='1' cellpadding='8' cellspacing='0'>";
    $html .= "<tr>
                <th>Código</th>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Dosis</th>
                <th>Forma farmacéutica</th>
                <th>Vía de administración</th>
              </tr>";

    foreach ($medicamentos as $med) {
        $html .= "<tr>
                    <td>$med->codigo</td>
                    <td>$med->no</td>
                    <td>$med->nombre</td>
                    <td>$med->dosis</td>
                    <td>$med->forma</td>
                    <td>$med->via</td>
                  </tr>";
    }

    $html .= "</table>";

    return $html;
});

Route::get('/clientes/vip', function () {
     // creamos la lista de clientes array()

    $clientes = [
        (object)[ 'id' => 1, 'nombre' => 'Karen Criollo', 'telefono' => '+503 1234 5678', 'puntos_acumulados' => '15' ],
        (object)[ 'id' => 2, 'nombre' => 'Joel', 'telefono' => '+503 8765 4321', 'puntos_acumulados' => '5'],
        (object)[ 'id' => 3, 'nombre' => 'Cristofer Guevara', 'telefono' => '+503 5555 5555', 'puntos_acumulados' => '25']
    ];

    //Creamos la tabla  con los registros de clientes de forma dinámica

    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Puntos Acumulados</th>
                </tr>
                </thead>
                <tbody>
                
    ';
    foreach ($clientes as $cliente) {
        $html .= "
                <tr>
                    <td>$cliente->id</td>
                    <td>$cliente->nombre</td>
                    <td>$cliente->telefono</td>
                    <td>$cliente->puntos_acumulados</td>
                </tr>
        ";
    }

    $html .= '
                </tbody>
            </table>
    ';
    
    //Pintamos en la ventana del navegador la tabla
    echo $html;
});


Route::get('/proveedores/internacionales', function () {
    // creamos la lista de proveedores array()

    $proveedores = [
        (object)[ 'empresa' => 'PharmaGlobal S.A.', 'pais_origen' => 'México', 'medicamento_principal' => 'Omeprazol', 'tiempo_entrega_dias' => 10 ],
        (object)[ 'empresa' => 'MedSupply Corp', 'pais_origen' => 'Estados Unidos', 'medicamento_principal' => 'Ondansetron', 'tiempo_entrega_dias' => 22 ],
        (object)[ 'empresa' => 'Farmacéutica del Sur', 'pais_origen' => 'Colombia', 'medicamento_principal' => 'Metoclopramida', 'tiempo_entrega_dias' => 18 ],
        (object)[ 'empresa' => 'AsiaMed Trading', 'pais_origen' => 'India', 'medicamento_principal' => 'Granisetron', 'tiempo_entrega_dias' => 7 ]
    ];

    // Creamos la tabla con los registros de proveedores de forma dinámica

    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>Empresa</th>
                    <th>País de Origen</th>
                    <th>Medicamento Principal</th>
                    <th>Tiempo de Entrega (días)</th>
                </tr>
                </thead>
                <tbody>
                
    ';

    foreach ($proveedores as $proveedor) {

        // Evaluamos si el tiempo de entrega es crítico
        $advertencia = '';
        if ($proveedor->tiempo_entrega_dias > 15) {
            $advertencia = ' (Demora Crítica)';
        }

        $html .= "
                <tr>
                    <td>$proveedor->empresa</td>
                    <td>$proveedor->pais_origen</td>
                    <td>$proveedor->medicamento_principal</td>
                    <td>$proveedor->tiempo_entrega_dias dias$advertencia</td>
                </tr>
        ";
    }

    $html .= '
                </tbody>
            </table>
    ';

    // Pintamos en la ventana del navegador la tabla
    echo $html;
});

Route::get('/lotes/inventario', function () {

    $lotes = json_decode(json_encode([
        [ 'codigo_lote' => 'L-2026-001', 'nombre_medicamento' => 'Ondansetron', 'cantidad_cajas' => 40, 'temperatura_requerida_celsius' => 4 ],
        [ 'codigo_lote' => 'L-2026-002', 'nombre_medicamento' => 'Omeprazol', 'cantidad_cajas' => 75, 'temperatura_requerida_celsius' => 20 ],
        [ 'codigo_lote' => 'L-2026-003', 'nombre_medicamento' => 'Insulina Glargina', 'cantidad_cajas' => 15, 'temperatura_requerida_celsius' => 2 ],
        [ 'codigo_lote' => 'L-2026-004', 'nombre_medicamento' => 'Famotidina', 'cantidad_cajas' => 60, 'temperatura_requerida_celsius' => 25 ]
    ]));

    // Creamos la tabla con los registros de lotes de forma dinámica

    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>Código de Lote</th>
                    <th>Medicamento</th>
                    <th>Cantidad de Cajas</th>
                    <th>Temperatura Requerida (°C)</th>
                </tr>
                </thead>
                <tbody>
                
    ';

    foreach ($lotes as $lote) {

        // Evaluamos si el medicamento requiere cadena de frío
        $etiqueta = '';
        if ($lote->temperatura_requerida_celsius <= 5) {
            $etiqueta = ' [Requiere Cadena de Frío]';
        }

        $html .= "
                <tr>
                    <td>$lote->codigo_lote</td>
                    <td>$lote->nombre_medicamento$etiqueta</td>
                    <td>$lote->cantidad_cajas</td>
                    <td>$lote->temperatura_requerida_celsius</td>
                </tr>
        ";
    }

    $html .= '
                </tbody>
            </table>
    ';

    // Pintamos en la ventana del navegador la tabla
    echo $html;
});


Route::get('/facturas/clientes/historial', function () {

    $facturas = json_decode(json_encode([
        [ 'num_factura' => 'F-1', 'cliente' => 'Henry Josue ', 'fecha_emision' => '2026/06/06', 'total_pagar' => 100, 'estado' => 'Pagada' ],
        [ 'num_factura' => 'F-2', 'cliente' => 'Alvaro Francisco', 'fecha_emision' => '2026/06/15', 'total_pagar' => 240, 'estado' => 'Pendiente' ],
        [ 'num_factura' => 'F-3', 'cliente' => 'Angel Gomez', 'fecha_emision' => '2026/06/20', 'total_pagar' => 150, 'estado' => 'Pagada' ],
        [ 'num_factura' => 'F-4', 'cliente' => 'Emilia Estefany', 'fecha_emision' => '2026/06/28', 'total_pagar' => 200, 'estado' => 'Pendiente' ]
    ]));

    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>Numero de Factura</th>
                    <th>Cliente</th>
                    <th>Fecha de Emisión</th>
                    <th>Total a Pagar</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                
    ';

    foreach ($facturas as $factura) {

        $estadoTexto = $factura->estado;

        if ($factura->estado === 'Pendiente') {
            $estadoTexto = '🚨 PENDIENTE DE COBRO.';
        }

        $html .= "
                <tr>
                    <td>$factura->num_factura</td>
                    <td>$factura->cliente</td>
                    <td>$factura->fecha_emision</td>
                    <td>$factura->total_pagar</td>
                    <td>$estadoTexto</td>
                </tr>
        ";
    }

    $html .= '
                </tbody>
            </table>
    ';

    echo $html;
});

Route::get('/facturas/clientes/detalle/{numero}', function (string $numero) {

    $facturas = json_decode(json_encode([
        [ 'num_factura' => 'F-1', 'cliente' => 'Henry Josue ', 'fecha_emision' => '2026/06/06', 'total_pagar' => 100, 'estado' => 'Pagada' ],
        [ 'num_factura' => 'F-2', 'cliente' => 'Alvaro Francisco', 'fecha_emision' => '2026/06/15', 'total_pagar' => 240, 'estado' => 'Pendiente' ],
        [ 'num_factura' => 'F-3', 'cliente' => 'Angel Gomez', 'fecha_emision' => '2026/06/20', 'total_pagar' => 150, 'estado' => 'Pagada' ],
        [ 'num_factura' => 'F-4', 'cliente' => 'Emilia Estefany', 'fecha_emision' => '2026/06/28', 'total_pagar' => 200, 'estado' => 'Pendiente' ]
    ]));

    $facturaEncontrada = null;

    foreach ($facturas as $factura) {
        if ($factura->num_factura === $numero) {
            $facturaEncontrada = $factura;
            break;
        }
    }

    if ($facturaEncontrada) {

        $estadoTexto = $facturaEncontrada->estado;

        if ($facturaEncontrada->estado === 'Pendiente') {
            $estadoTexto = '🚨 PENDIENTE DE COBRO.';
        }

        $html = "
                <h2>Ficha de Factura</h2>
                <ul>
                    <li><strong>Número de Factura:</strong> $facturaEncontrada->num_factura</li>
                    <li><strong>Cliente:</strong> $facturaEncontrada->cliente</li>
                    <li><strong>Fecha de Emisión:</strong> $facturaEncontrada->fecha_emision</li>
                    <li><strong>Total a Pagar:</strong> $facturaEncontrada->total_pagar</li>
                    <li><strong>Estado:</strong> $estadoTexto</li>
                </ul>
            </div>
        ";

    } else {
        $html = '<h1>Factura No Encontrada</h1>';
    }

    echo $html;
});

Route::get('/facturas/proveedores/resumen', function () {

    $facturas = json_decode(json_encode([
    [ 'proveedor' => 'EcoSalud', 'nrc' => '112233-4', 'monto_sin_iva' => 640.75 ],
    [ 'proveedor' => 'MedicLine', 'nrc' => '556677-8', 'monto_sin_iva' => 1580.20 ],
    [ 'proveedor' => 'Farmacia Central.', 'nrc' => '998877-6', 'monto_sin_iva' => 845.90 ],
    [ 'proveedor' => 'HealthBrid', 'nrc' => '443322-1', 'monto_sin_iva' => 390.15 ]
    ]));

    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>NRC</th>
                    <th>Monto sin IVA</th>
                    <th>IVA (13%)</th>
                    <th>Monto Total</th>
                </tr>
                </thead>
                <tbody>
                
    ';

    # Variables acumuladoras para los totales generales
    $totalSinIvaAcumulado = 0;
    $totalIvaAcumulado = 0;
    $totalGeneralAcumulado = 0;

    foreach ($facturas as $factura) {

        # Calculamos el IVA y el monto total de la fila actual
        $iva = $factura->monto_sin_iva * 0.13;
        $montoTotal = $factura->monto_sin_iva + $iva;

        # sumando a los acumuladores generales
        $totalSinIvaAcumulado += $factura->monto_sin_iva;
        $totalIvaAcumulado += $iva;
        $totalGeneralAcumulado += $montoTotal;

        $html .= "
                <tr>
                    <td>$factura->proveedor</td>
                    <td>$factura->nrc</td>
                    <td>\$" . number_format($factura->monto_sin_iva, 2) . "</td>
                    <td>\$" . number_format($iva, 2) . "</td>
                    <td>\$" . number_format($montoTotal, 2) . "</td>
                </tr>
        ";
    }

    $html .= "
                </tbody>
                <tfoot>
                <tr>
                    <td colspan='2'><strong>TOTALES</strong></td>
                    <td><strong>\$" . number_format($totalSinIvaAcumulado, 2) . "</strong></td>
                    <td><strong>\$" . number_format($totalIvaAcumulado, 2) . "</strong></td>
                    <td><strong>\$" . number_format($totalGeneralAcumulado, 2) . "</strong></td>
                </tr>
                </tfoot>
            </table>
    ";

    echo $html;
});


Route::get('/pagina02/{nombre}/{edad}', function ($nombre, $edad) {
    return view('ejercicios.vista02', compact('nombre', 'edad'));
});

Route::get('/clientes/registro', function () {
    return view('ejercicios.registro');
});

require __DIR__ . '/settings.php';


