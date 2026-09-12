<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>LOJA DO ESTUDANTE</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
    <div class="container">
        <h1>Loja do estudante</h1>
        <!-- Formulário -->
        <form action="" method="POST">
            <label for="produto">Produto:</label>
            <input type="text" name="produto" id="produto" required>

            <label for="preco">Preço(R$):</label>
            <input type="number" name="preco" id="preco" step="0.01" min="0" required>

            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" required>
                <option value="">Selecione uma categoria</option>
                <option value="Tecnologia">Tecnologia</option>
                <option value="Livros">Livros</option>
                <option value="Material Escolar">Material Escolar</option>
            </select>

            <button type="submit">Calcular desconto</button>
        </form>

        <!-- Resultado aparece aqui -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // coleta de dados
            $produto = $_POST["produto"];
            $preco = floatval($_POST["preco"]);
            $categoria = $_POST["categoria"];

            // lógica de desconto
            $desconto = 0;
            if ($categoria == "Tecnologia") {
                $desconto = 10;
            } elseif ($categoria == "Livros") {
                $desconto = 20;
            } elseif ($categoria == "Material Escolar") {
                $desconto = 5;
            }

            // cálculo
            $valorDesconto = $preco * ($desconto / 100);
            $precoFinal = $preco - $valorDesconto;

            // exibição formatada
            echo "<div class='resumo'>";
            echo "<h2>Resumo da Compra</h2>";
            echo "<p><strong>Produto:</strong> $produto</p>";
            echo "<p><strong>Preço original:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
            echo "<p><strong>Categoria:</strong> $categoria</p>";
            echo "<p><strong>Desconto:</strong> $desconto%</p>";
            echo "<p><strong>Valor do desconto:</strong> R$ " . number_format($valorDesconto, 2, ',', '.') . "</p>";
            echo "<p><strong>Preço final:</strong> R$ " . number_format($precoFinal, 2, ',', '.') . "</p>";
            echo "<div class='btn-voltar-container'> <a class='btn-voltar' href='index.php'>Voltar</a> </div>";
        }
        ?>
    </div>
</body>
</html>
