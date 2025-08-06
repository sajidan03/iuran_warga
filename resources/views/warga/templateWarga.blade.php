<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan UI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: flex;
            align-items: center;
            background-color: #007a63;
            color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
        }
        .text {
            font-weight: bold;
            color: #333;
        }
        .filter {
            font-size: 14px;
            color: #555;
            margin-right: 20px;
        }
        .button {
            background-color: #007a63;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #005542;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo">K</div>
    <div class="text">kaswarga.ypc</div>
    <div class="filter">Fitur</div>
    <button class="button">Masuk →</button>
</div>

</body>
</html>
