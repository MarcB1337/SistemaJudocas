<body>
    <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        echo "<h3>".'ATENÇÃO! Ao realizar esta ação, você excluírá esse registro permanentemente, deseja realmente excluir?'."</h3>";
        echo "<a href='banco_de_dados/delete.php?id=$id' style='color:white;'>SIM</a> | ";
        echo "<a href='consulta.php' style='color:white;'>NÃO</a>";
    ?>
</body>

<style>
    body{
        margin-top: 24px;
        background-color: black;
        text-align: center;
        color: white;
    }
</style>