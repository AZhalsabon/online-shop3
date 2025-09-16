<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kаталог товаров</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(135deg, #f4f4f4 0%, #e9ecef 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border-radius: 12px 12px 0 0;
        }
        h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 40px;
            background: linear-gradient(45deg, #007bff, #0056b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        .product-card {
            border: none;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 123, 255, 0.2);
        }
        .product-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #28a745);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        .product-card:hover::after {
            transform: scaleX(1);
        }
        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #eee, #ddd);
            transition: transform 0.3s ease;
        }
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        .product-name {
            font-weight: 600;
            font-size: 1.3em;
            margin-bottom: 10px;
            color: #333;
            flex-grow: 1;
        }
        .product-description {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 15px;
            line-height: 1.4;
        }
        .product-price {
            font-weight: 700;
            font-size: 1.2em;
            color: #007bff;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .product-price i {
            margin-right: 5px;
            color: #28a745;
        }
        .btn-buy {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-buy i {
            margin-right: 8px;
        }
        .btn-buy:hover {
            background: linear-gradient(45deg, #0056b3, #004085);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }
        .btn-buy:active {
            transform: scale(0.98);
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            .catalog-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .product-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1><i class="fas fa-shopping-bag"></i>Каталог товаров</h1>
    <div class="catalog-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src=<?php echo $product['image_url']?> alt="товар" class="product-image" />
                <div class="product-name"><?php echo $product['name']?></div>
                <div class="product-description"><?php echo $product['description']?></div>
                <div class="product-price"><i class="fas fa-ruble-sign"></i> <?php echo $product['price']?></div>
                <button class="btn-buy"><i class="fas fa-cart-plus"></i> Купить</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

