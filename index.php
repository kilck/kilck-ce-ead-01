<?php
$data['items'] = array(
	array(
	    'nome' => 'John Petrucci', 
	    'peso' => 100, 
	    'altura' => '2.00', 
	    'data' => '01/10/1980', 
	    ), 
	array(
	    'nome' => 'John Myung', 
	    'peso' => 80, 
	    'altura' => 1.72, 
	    'data' => '28/02/1990', 
	    ),
	array(
	    'nome' => 'James Labrie', 
	    'peso' => 54, 
	    'altura' => 1.64, 
	    'data' => '10/09/1985', 
	    ), 
	array(
	    'nome' => 'Jordan Rudess', 
	    'peso' => 85, 
	    'altura' => 1.73, 
	    'data' => '04/09/1989', 
	    ),
	array(
	    'nome' => 'Mike Mangini', 
	    'peso' => 46, 
	    'altura' => 1.55, 
	    'data' => '31/12/1978', 
	    ),
);
function calculaimc($peso,$altura){    
  $conta1 = $altura*$altura;
  $conta2 = $peso/$conta1;    
  $resultado = number_format($conta2, 1,',','0');
  return $resultado;
}
function calculaidade($data){    
    // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $data);  
    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);    
    /*
      subtrair timestamp de hoje com timestamp do nascimento, 
      dividir pelos 60 segundos, pelos 60 minutos, 
      pelas 24 horas e pelos 365.25 dias do ano
    */
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    return $idade;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Promove Nutrição</title>		
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/index.css" >
		<script type="text/javascript" src="js/jquery-latest.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	</head>
<body>
	<header>
		<div class="container">
			<h1>Promove Nutrição</h1>
		</div>
	</header>
	<main>
		<section class="container">
			<h2>Meus pacientes</h2>
			<table border="1" class="tablesorter">
				<thead>
				<tr>
					<th rowspan="2">Nome </th>
					<th rowspan="2">Peso(kg) </th>
					<th rowspan="2">Altura(m) </th>
					<th rowspan="2">IMC </th>
					<th rowspan="2"> Data </th>
					<th rowspan="2">Idade </th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($data['items'] as $rows) {?>
				<tr >
				  <td><?php echo $rows['nome'];?></td>
				  <td><?php echo $rows['peso'];?></td>
				  <td><?php echo $rows['altura'];?></td>
				  <td>
					<?php 
					 $peso = $rows['peso'];
					 $altura =  $rows['altura'];
					 echo calculaimc($peso,$altura);
					?>
				  </td>
				  <td><?php echo $rows['data'];?></td>
				  <td>
					<?php 
					 $data = $rows['data'];
					 echo calculaidade($data);
					?>
				  </td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</section>
	</main> 
	<script type="text/javascript">
	
	$(function() {
		$("table").tablesorter({debug: true})
		
		
		
	});
	</script>	 
</body>
</html>