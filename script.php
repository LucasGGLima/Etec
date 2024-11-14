	<?php

date_default_timezone_set("America/Sao_Paulo");

	  include 'conexao.php';

function quant_dias_mes($numeroMes, $bissexto){
   
    switch ($numeroMes) {
    	case 1: case 3: 
		case 5:case 7:
    	case 8: case 10:
		case 12: return 31;
        break;
    	case 4: case 6:
      	case 9: case 11:
        return 30;
        break;
      	case 2:
        	if ($bissexto == true) {
        		return 29;
        	} else {
          		return 28;
        	}
        break;
    	default:
        return "";
		
    }
  }






  function ano_biss($ano) {
    $resto = $ano % 4;
    if($resto == 0){
      return true;
    } else {
      return false;
    }
  }

$sqlInsertUsuario = 
    "INSERT INTO tb_usuario
    (nome, sobrenome, data_nasc, telefone, senha, email	)
    VALUES (?, ?, ?, ?, ?, ?)"
;


// id_vaca	id_usuario	nome_animal	data_nasc	idade	peso	cod_animal	especie	


$sqlInsertAnimal = 
	"INSERT INTO tb_vaca 
	(id_usuario, nome_animal, data_nasc, idade, peso, cod_animal, especie, data_cad)
 	VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
;
//  id_vaca	id_usuario	nome_animal	especie	idade_animal	data_nasc	peso	cod_animal	num_lactacao	ultima_lactacao	status_animal
// Textos completos	


function calcData($data01, $data02){
// $dataNasc = date("19/11/2006");
// $anoNasc = substr($dataNasc, 6, strlen($dataNasc));
$data01 = explode("-", $data01);
$data02 = explode("-", $data02);

// echo print_r($data01);

$idade = $data01[0] - $data02[0];

if($data01[1] == $data02[1] && $data01[3] >= $data02[3]){
	return $idade;

} else {
	if($data01[1] < $data02[1]){
		return $idade - 1;
	} 
	
	return $idade;
	
	
}

}

function select_ciclo_animal($id){

	include 'conexao.php';

	$selectSQL = "SELECT * FROM tb_vaca WHERE id_vaca = ?";
	
	$stmTbVaca = $con ->prepare($selectSQL);
	
	$stmTbVaca ->bindParam(1, $id);
	
	$stmTbVaca->execute();
	
	$arrayVaca = $stmTbVaca->fetchAll();


	$selectSQL = "SELECT * FROM tb_ciclo_animal WHERE id_animal = ? ORDER BY id_ciclo DESC";
	

	$stmTbCiclo = $con ->prepare($selectSQL);

	$stmTbCiclo ->bindParam(1, $id);
	
	$stmTbCiclo->execute();
	
	$arrayCiclo = $stmTbCiclo->fetchAll();

	$arrayIfos = [];

	$arrayInfos[0] = $arrayVaca;
	$arrayInfos[1] = $arrayCiclo;
	
	return $arrayInfos;
	
	
	}

	function selectStatus($num){
		$arrayInfoStatus = [];
		switch($num){
			case "1":
			$arrayInfoStatus[0] = "Em gestação";
			$arrayInfoStatus[1] = "
			<p>Alimentação: A dieta deve ser ajustada para garantir que a vaca receba nutrientes suficientes para o desenvolvimento do feto, sem excesso de gordura. A proteína, vitaminas e minerais (principalmente cálcio e fósforo) devem ser equilibrados para evitar problemas como a hipocalcemia.</p>
			<p>Exercício moderado: A vaca deve ter espaço suficiente para se mover sem restrições, mas sem forçar atividades que possam causar estresse ou lesões.</p>
			<p>Cuidados com a saúde: A vaca grávida deve ser monitorada quanto a sinais de complicações, como retenção de placenta, distocia (dificuldade no parto) e infecções.</p>
			<p>Vacinação e vermifugação: Manter as vacas vacinadas e vermifugadas de acordo com o calendário veterinário.</p>
			";
			break;
			case "2":
			$arrayInfoStatus[0] = "Em lactação";
			$arrayInfoStatus[1] = "
			<p>Alimentação: A vaca lactante tem uma maior demanda nutricional, pois precisa produzir leite. A dieta deve ser balanceada, rica em energia, proteínas e minerais (especialmente cálcio, fósforo e magnésio).</p>
			<p>Hidratação: A ingestão de água é crucial, pois a produção de leite aumenta as necessidades de líquidos.</p>
			<p>Saúde do úbere: A higiene do úbere deve ser mantida para evitar mastite (infecção nas glândulas mamárias). A ordenha deve ser feita com cuidado para prevenir lesões.</p>
			<p>Monitoramento da produção de leite: A quantidade e a qualidade do leite devem ser monitoradas regularmente. A vaca deve ser observada para detectar sinais de doenças ou desconforto.</p>
			";
			break;
			case "3":
			$arrayInfoStatus[0] = "Em período seco";
			$arrayInfoStatus[1] = "
<p>Alimentação: Durante o período seco, a vaca não precisa de tanta energia quanto na lactação, mas deve receber uma dieta balanceada para manter sua saúde e preparar seu corpo para a próxima lactação. O fornecimento de forragens de boa qualidade é importante, junto com os minerais.</p>
<p>Gestão do corpo: O objetivo é manter a vaca em condição corporal adequada (nem muito magra nem muito gorda), o que contribui para uma melhor produção de leite após o parto.</p>
<p>Desafetação: A ordenha deve ser interrompida ou reduzida de forma gradual para evitar problemas no úbere, como mastite ou congestão mamária.</p>
			";
			break;
			case "4":
			$arrayInfoStatus[0] = "Em período fertíl";
			$arrayInfoStatus[1] = "
			período fertíl período fertíl período fertíl
			período fertíl período fertíl período fertíl
			período fertíl período fertíl período fertíl
			";
			break;
			default:
			
			return "indefinido";

			break;
		}

		return $arrayInfoStatus;
	}



function calc_data($method, $data01, $data02, $unidade, $quant, $statusAnimal){

	$mesDoAno = [
		"Janeiro", "Fefereiro", "Março",
		"Abril", "Maio", "Junho",
		"Julho", "Agosto", "Setembro",
		"Outubro", "Novembro", "Dezembro" 
	];

	switch($method){
		case 1:
		$d= strtotime("+$quant $unidade");
		$dataPrevista = Date("Y-m-d", $d);
		break;
		case 2:
		$dataPrevista = $data02;
		break;
		default:
		return null;
		break;
	}

	switch($statusAnimal){
		case 1: 
			$parmStatus= "gestacao";
		break;
		case 2: 
			$parmStatus= "lactacao";
		break;
		case 3: 
			$parmStatus= "periodo-seco";
		break;
		case 4: 
			$parmStatus= "cio";
		break;
	}

	$dataAtual = explode("-", $data01);
	$dataPrevista = explode("-", $dataPrevista);

	$mesAlerta = $mesAtual = $mes = (int)$dataAtual[1];
	$ultimoMes = 13;
	$dia = 1;
	$diaAtual = $parmdia = (int)$dataAtual[2];

	$diaPrevisto = (int)$dataPrevista[2];
	$mesPrevisto = (int)$dataPrevista[1];

	$parmMesesAlerta = $mesAtual;
	$mesesAlerta = [];
	
	if($mesPrevisto < $mesAtual){

		for($parmMesesAlerta; $parmMesesAlerta <= 12;  $parmMesesAlerta++){

			$mesesAlerta[$parmMesesAlerta] = $parmMesesAlerta;
					
		}

		$parmMesesAlerta = 1;

		for($parmMesesAlerta; $parmMesesAlerta <= $mesPrevisto;  $parmMesesAlerta++){

			$mesesAlerta[$parmMesesAlerta] = $parmMesesAlerta;
					
		}


	} else {
	
		for($parmMesesAlerta; $parmMesesAlerta <= $mesPrevisto;  $parmMesesAlerta++){

			$mesesAlerta[$parmMesesAlerta] = $parmMesesAlerta;
					
		}
	
	}
			
	for($mes; $mes <= $ultimoMes; $mes++){

		if($mes == 13){

			$mes = 1;
			$ultimoMes = (int)$dataAtual[1]-1;

		}

		if(isset($mesesAlerta[$mes])){
			
			echo "<div id='mes-$mes' class='meses' class='red'>";

				if($mes >= $dataAtual[1] && $mes <= 12){

					echo '
						<div class="info-ano center">'
						.$mesDoAno[$mes-1]. "-" . $dataAtual[0].
						'</div>'
					;

				} else{

					$parmAno = $dataAtual[0] + 1;

					echo '
						<div class="info-ano center">'
						.$mesDoAno[$mes-1]. "-" . $parmAno.
						'</div>'
					;

				}

			echo '
				<div class="info-semana">
					<div>D</div>
					<div>S</div>
					<div>T</div>
					<div>Q</div>
					<div>Q</div>
					<div>S</div>
					<div>S</div>
				</div>'
			;
			
			
			for($dia; $dia <= quant_dias_mes($mes, ano_biss($dataPrevista[0]));$dia++){
					
					if($mesesAlerta[$mes] == $mesPrevisto){

						$ultimo = $diaPrevisto;

					} else {

						$ultimo = quant_dias_mes($mes, ano_biss($dataPrevista[0]));

					}

					if($dia == $parmdia){

						if($dia < $ultimo){
							$parmdia++;
						}

						if($dia == 1){

							echo  " <div id='dia-$mes-$dia' class='dias alerta $parmStatus'>
							 $dia 
							 </div>";
							// $parmStatus

						} else {
				
							echo  "<div class='dias alerta $parmStatus'> 
							$dia 
							</div>";

						}

					}else{
						
					if($dia == 1){
							echo  "<div id='dia-$mes-$dia' class='dias'> 
							$dia 
							</div>";
						} else {
							echo  "<div class='dias'> 
							$dia 
							</div>";

						}
					}
			}
			
			echo "</div>";     
			
			
			} else  {

			echo "<div id='mes-$mes' class='meses'>";

			if($mes >= $dataAtual[1] && $mes <= 12){

				echo '
			<div class="info-ano center">'
			.$mesDoAno[$mes-1]. "-" . $dataAtual[0].
			'</div>'
		;

			} else{

				$parmAno = $dataAtual[0] + 1;

				echo '
			<div class="info-ano center">'
			.$mesDoAno[$mes-1]. "-" . $parmAno.
			'</div>'
		;

			}

			echo '
				<div class="info-semana">
					<div>D</div>
					<div>S</div>
					<div>T</div>
					<div>Q</div>
					<div>Q</div>
					<div>S</div>
					<div>S</div>
				</div>'
			;

			for($dia; $dia <= quant_dias_mes($mes, ano_biss($dataPrevista[0]));$dia++){
				if($dia == 1){	
				echo  "<div id='dia-$mes-$dia' class='dias'> 
				$dia 
				</div>";
				} else {
					echo  "<div class='dias'> 
					$dia 
					</div>";

				}
			}
			echo "</div>"; 
			}
			
			$dia = $parmdia = 1;
	}

	
			
}
