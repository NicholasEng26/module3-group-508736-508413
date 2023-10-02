<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nick + Hanson News</title>
    <link rel="stylesheet" href="includes/styles.css">
    <style>
        .search-articles {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .article {
            flex-basis: calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #F5F5F5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .article h2 {
            margin-top: 0;
        }

        .article img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

        .article p {
            margin: 10px 0;
        }

        .article form {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
     <!-- Your website header content -->
    </header>
    <?php
        include 'navbar.php';
        require 'database/config.php';
    ?>