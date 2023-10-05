<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>

    <h1>Resultado do processamento</h1>
    </header>
    <main>
        <?php 
            $nome = $_GET["nome"] ??"sem nome";
            $sobrenome = $_GET["sobrenome"] ?? "desconhecido";
            echo "<p>É um prazer te conhecer! <strong>$nome $sobrenome</strong>";
            $conexao = new PDO("mysql:host=127.0.0.1; dbname=Cadastro","root","");
            $inserir = $conexao->prepare("INSERT INTO cadastro values (:nome, :sobrenome)");
            $inserir->bindParam(":nome", $nome);
            $inserir->bindParam(":sobrenome", $sobrenome);
            $inserir->execute();
        ?>
       <?php 
       $listagem = $conexao->prepare("SELECT * FROM cadastro");
       $listagem->execute();
       $resultado = $listagem->fetchAll(PDO::FETCH_ASSOC);
       foreach($resultado as $resul){
        print $resul["nome"]." ".$resul["sobrenome"];
        print "<br>";
       }
       ?>
       <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
    </main>
</body>
</html>
