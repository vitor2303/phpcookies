<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'credenciais_incorretas'): ?>
        <p>Credenciais incorretas. Por favor, tente novamente.</p>
    <?php endif; ?>
    <form action="index.php" method="post">
    <form method="post">
    <input type="text" name="login">
    <input type="password" name="senha">
    <input type="submit" name="acao" value="enviar">
    </form>
</body>
</html>

