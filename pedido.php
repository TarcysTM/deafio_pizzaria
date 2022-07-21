<?php
    header('Access-Control-Allow-Origin: *');
    require_once('config.php');
    $sql = "SELECT ingredientes.nome_ingr, ingredientes.valor_ingr FROM ingredientes,pedido,itempedido 
    WHERE ingredientes.id_ingr = intempedido.fk_ingr AND pedido.id_pedido = itempedido.fk_pedido";

    $resultado = $connection->query($sql);

    if($resultado->num_rows > 0){
        foreach($resultado as $row){
            $soma = $soma + $row["valor_ingr"];
            echo"<tr>";
                echo"<td>".$row["nome_ingr"]."</td>";
                echo"<td>".$row["valor_ingr"]."</td>";  

                echo"<td>
                    <button type='button' class='btn btn-success' onclick=getId('".$row['id_ingr']."')>editar</button>
                    <button type='button' class='btn btn-danger' onclick=remove('".$row['id_ingr']."')>excluir</button>
                </td>" 
            echo"</tr>";    
                
        }     

        //echo "<button type='button' class='btn btn-success' onclick=createPedido('".$row['id_ingr']."')>Incluir</button>"
    }    
    else{
        echo("");
    }
?>