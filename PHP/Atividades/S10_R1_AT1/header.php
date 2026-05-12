<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessões e Cookies</title>
    <style>
    body {
        font-family: Georgia, 'Times New Roman', Times, serif;
        background-color: #0a83d3;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; 
    }

    .cartao-sistema {
        background: linear-gradient(to right, #45a8e2, #0a478d);
        width: 90%;
        max-width: 450px; 
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        text-align: center;
        border: 1px solid black;
    }

    h1 { color: #ffffff; margin-bottom: 5px; }
    h2 { color: #ffffff; margin-top: 0; }
    hr { border: 0; height: 1px; background: #ddd; margin: 20px 0; }
    p { color: #000000; line-height: 1.6; }

    .info-box {
        background-color: #f1f8ff;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #bbdefb;
        margin: 20px 0;
        text-align: left;
    }

    .btn {
        margin-top: 10px;
        background-color: #072d66;
        color: white;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 25px;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .btn:hover { background-color: #1565c0; }

    footer {
        margin-top: 30px;
        font-size: 0.85em;
        color: #777;
    }
    </style>
</head>
<body>
    <div class="cartao-sistema">
        <header>
            <h1>Sistema de Cookies - Aceitas?</h1>
            <hr>
        </header>