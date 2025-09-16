<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный профиль - Магазин</title>
    <style>
        /* Общий стиль */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            overflow: hidden;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Шапка профиля */
        .profile-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #ddd;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: bold;
            color: #666;
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .profile-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .profile-header p {
            margin: 5px 0 0;
            opacity: 0.8;
        }

        /* Навигация табов */
        .tabs {
            display: flex;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .tab-button {
            flex: 1;
            padding: 15px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .tab-button.active {
            background: #007bff;
            color: white;
        }

        /* Контент табов */
        .tab-content {
            display: none;
            padding: 20px;
        }

        .tab-content.active {
            display: block;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .order-item {
            background: #f8f9fa;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }

        /* Кнопки */
        .btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #0056b3;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.2);
        }

        /* Responsive */
        @media (max-width: 600px) {
            .profile-container {
                width: 95%;
            }
            .tabs {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="avatar"><?php echo strtoupper(substr($user_name, 0, 1)); ?></div>
            <h1><?php echo htmlspecialchars($user_name); ?></h1>
            <p><?php echo htmlspecialchars($user_email); ?></p>
            <button class="btn logout-btn" onclick="window.location.href='logout.php'">Выйти</button>
        </div>

        <div class="tabs">
            <button class="tab-button active" onclick="showTab(0)">Личные данные</button>
            <button class="tab-button" onclick="showTab(1)">История заказов</button>
            <button class="tab-button" onclick="showTab(2)">Настройки</button>
        </div>

        <div id="tab-0" class="tab-content active">
            <div class="section">
                <h2>Личные данные</h2>
                <p><strong>Имя:</strong> <?php echo htmlspecialchars($user_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>
                <button class="btn">Редактировать профиль</button>
            </div>
        </div>

        <div id="tab-1" class="tab-content">
            <div class="section">
                <h2>История заказов</h2>
                <?php if (empty($orders)): ?>
                    <p>У вас пока нет заказов.</p>
                <?php else: ?>
                    <?php foreach ($orders as $order): ?>
                        <div class="order-item">
                            <span><?php echo htmlspecialchars($order['product_name']); ?></span>
                            <span><?php echo htmlspecialchars($order['order_date']); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div id="tab-2" class="tab-content">
            <div class="section">
                <h2>Настройки</h2>
                <button class="btn">Изменить пароль</button>
                <button class="btn">Настройки уведомлений</button>
            </div>
        </div>
    </div>

    <script>
        function showTab(index) {
            // Скрываем все табы
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.remove('active'));

            // Показываем выбранный
            document.getElementById('tab-' + index).classList.add('active');

            // Обновляем активную кнопку
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(btn => btn.classList.remove('active'));
            buttons[index].classList.add('active');
        }
    </script>
</body>
</html>

