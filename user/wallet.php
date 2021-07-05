<?php
/* Este archivo debe manejar la lógica para obtener la información de la billetera */
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
$sql = pg_query($dbconn, // Consulta bastante parecida al bonus de la Tarea 1
	'SELECT
		moneda.sigla AS "Codigo",
		moneda.nombre AS "Nombre",
		usuario_tiene_moneda.balance AS "Cantidad",
		precio_moneda.valor AS "Valor Actual",
		(precio_moneda.valor*usuario_tiene_moneda.balance) AS "Total"
	FROM
		usuario_tiene_moneda
		INNER JOIN moneda
			ON moneda.id = usuario_tiene_moneda.id_moneda
		INNER JOIN precio_moneda
			ON moneda.id = precio_moneda.id_moneda
	WHERE
		usuario_tiene_moneda.id_usuario = '.$_SESSION["id"].'
		AND precio_moneda.id_moneda IN 
			(SELECT
				id_moneda
			FROM
				usuario_tiene_moneda
			WHERE
				id_usuario = '.$_SESSION["id"].') 
		AND precio_moneda.fecha IN 
			(SELECT
				fecha
			FROM
				precio_moneda
			WHERE
				fecha IN 
					(SELECT 
						MAX(fecha) 
					FROM 
						precio_moneda 
					GROUP BY 
						id_moneda))
		AND precio_moneda.valor IN
			(SELECT
				valor
			FROM
				precio_moneda
			WHERE
				fecha IN 
					(SELECT 
						MAX(fecha) 
					FROM 
						precio_moneda 
					GROUP BY 
						id_moneda))
		GROUP BY
		moneda.sigla, moneda.nombre, precio_moneda.valor, usuario_tiene_moneda.balance;'
);
while($row = pg_fetch_assoc($sql)) { // Iterar sobre los resultados de la consulta
	echo   '<tr>
				<td>'.$row["Codigo"].'</td>
				<td>'.$row["Nombre"].'</td>
				<td>'.$row["Cantidad"].'</td>
				<td>'.$row["Valor Actual"].'</td>
				<td>'.$row["Total"].'</td>
			</tr>';
}
pg_close();
?>