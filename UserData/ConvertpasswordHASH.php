<?php
// Definir los archivos CSV
$inputFile = 'usarDataTableUsuarioRealPassword.csv';
$outputFile = 'usarDataTableUsuarioHashed.csv';

// Abrir el archivo CSV para lectura
if (($handle = fopen($inputFile, 'r')) !== false) {
    // Abrir el archivo CSV de salida para escritura
    $outputHandle = fopen($outputFile, 'w');

    // Leer la primera línea (encabezados)
    $header = fgetcsv($handle, 1000, ',');

    // Escribir los encabezados en el nuevo archivo CSV
    fputcsv($outputHandle, $header);

    // Leer las filas del archivo CSV de entrada
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        // Hashear la contraseña (asumiendo que está en la columna 4 - índice 4)
        $data[4] = password_hash($data[4], PASSWORD_DEFAULT);

        // Escribir la fila modificada en el archivo de salida
        fputcsv($outputHandle, $data);
    }

    // Cerrar los archivos
    fclose($handle);
    fclose($outputHandle);

    echo "El archivo con contraseñas hasheadas se ha creado como $outputFile";
} else {
    echo "Error al abrir el archivo $inputFile";
}