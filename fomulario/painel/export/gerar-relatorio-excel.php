<?php
    $agendamentos = Agendamentos::totalAgendamentos();
    $falenameArquivo = "relatorio".date('d/m/Y--h:i:s').".xls";
    $arqexcel = '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Excel</title>
    <style>
        table{
            font-size: 13px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        thead th{
            background-color: #36304a;
            color: #fff;
            height: 20px;
        }
        tbody td{
            height: 20px;
            text-align: center;
        }
        tbody tr.style-tr-par td{
            background-color: #50c886;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
        $arqexcel .= "
        <table border='1'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Possui Ged</th>
                    <th>Nome do Ged</th>
                    <th>Nome do(a) Supervisor(a)</th>";
                    for($i = 1; $i <= 6; $i++){
                        $arqexcel .= "<th>Opção de Ajuda {$i}</th>";
                    }
                    $arqexcel .= "
                    <th>Necessidade</th>
                    <th>Momento do Registro</th>
                    <th>Momento do Agendamento</th>
                    <th>D/H da Visita</th>
                    <th>Nome do Profissional</th>
                    <th>Responsável pelo Agendamento</th>
                </tr>
            </thead>
            <tbody>";
                foreach($agendamentos as $key => $value){
                    if($key % 2 == 0){
                        $arqexcel .= "
                        <tr>
                            <td>{$value['nome']}</td>
                            <td>{$value['email']}</td>
                            <td>{$value['telefone']}</td>
                            <td>{$value['endereco']}</td>
                            <td>{$value['resp_ged']}</td>
                            <td>{$value['nome_ged']}</td>
                            <td>{$value['nome_supervisor']}</td>";
                            for($i = 1; $i <= 6; $i++){
                                $arqexcel .= "<td>".$value["tipo_ajuda_opcao{$i}"]."</td>";
                            }
                            $arqexcel .= "
                            <td>{$value['necessidade']}</td>
                            <td>".date('d/m/Y H:i:s', strtotime($value['momento_registro']))."</td>
                            <td>".date('d/m/Y H:i:s', strtotime($value['momento_agendamento']))."</td>
                            <td>".date('d/m/Y H:i:s', strtotime($value['data_agendamento']))."</td>
                            <td>{$value['nome_profissional']}</td>
                            <td>{$value['respon_agendamento']}</td>
                            </tr>";
                    }else{
                        $arqexcel .= "
                        <tr class='style-tr-par'>
                            <td>{$value['nome']}</td>
                            <td>{$value['email']}</td>
                            <td>{$value['telefone']}</td>
                            <td>{$value['endereco']}</td>
                            <td>{$value['resp_ged']}</td>
                            <td>{$value['nome_ged']}</td>
                            <td>{$value['nome_supervisor']}</td>";
                            for($i = 1; $i <= 6; $i++){
                                $arqexcel .= "<td>".$value["tipo_ajuda_opcao{$i}"]."</td>"; 
                            }
                            $arqexcel .= "
                            <td>{$value['necessidade']}</td>
                            <td>".date('d/m/Y H:i:s', strtotime($value['momento_registro']))."</td>
                            <td>".date('d/m/Y H:i:s', strtotime($value['momento_agendamento']))."</td>
                            <td>".date('d/m/Y H:i:s', strtotime($value['data_agendamento']))."</td>
                            <td>{$value['nome_profissional']}</td>
                            <td>{$value['respon_agendamento']}</td>
                        </tr>";
                    }
                }
            $arqexcel .= "
            </tbody>
        </table>";

        // Configurações header para forçar o download
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$falenameArquivo}\"" );
        echo $arqexcel;
    ?>
</body>
</html>