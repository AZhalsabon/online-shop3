<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин форма</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #667eea;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .link {
            margin-top: 15px;
            font-size: 14px;
        }

        .link a {
            color: #667eea;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        /* Адаптивность для мобильных */
        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
                margin: 20px;
            }
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Вход</h2>
    <form action="handle_login.php" method="post">
        <div class="form-group">
            <label for="login">login</label>
            <?php if (isset($err['login'])) { echo '<p style="color:#ff0000;">' . htmlspecialchars($err['login']) . '</p>'; } ?>

            <input type="login" id="login" name="login" placeholder="Введите ваш login" required>
        </div>
        <div class="form-group">
            <label for="password_login">Пароль</label>
            <?php if (isset($err['password_login'])) { echo '<p style="color:#ff0000;">' . htmlspecialchars($err['password_login']) . '</p>'; } ?>

            <input type="password_login" id="password_login" name="password_login" placeholder="Введите пароль" required>
        </div>
        <button type="submit">Войти</button>
    </form>
    <div class="link">
        <p><a href="#">Забыли пароль?</a></p>
        <p>Нет аккаунта? <a href="#">Зарегистрироваться</a></p>
    </div>
</div>
</body>
</html>
