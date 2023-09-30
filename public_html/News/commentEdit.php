<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Article Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .article {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sample Article Page</h1>
    </header>
    <main>
        <?php
            // Simulated article data
            $articleTitle = "Sample Article Title";
            $articleAuthor = "John Doe";
            $articleDate = "September 30, 2023";
            $articleContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam massa vitae ex rhoncus sodales. Maecenas sit amet condimentum libero. Nullam vel odio ac arcu posuere blandit a in quam. Nulla facilisi. Phasellus vitae libero nec arcu venenatis varius. Fusce tristique elit at libero posuere, id condimentum libero volutpat. Sed non aliquam metus, non dapibus ex. Sed vel mi vel enim congue vulputate. Suspendisse potenti. Nulla luctus massa non risus bibendum, non vestibulum purus malesuada.";

            // Display the article
            echo "<div class='article'>";
            echo "<h2>$articleTitle</h2>";
            echo "<p><strong>Author:</strong> $articleAuthor</p>";
            echo "<p><strong>Date:</strong> $articleDate</p>";
            echo "<p>$articleContent</p>";
            echo "</div>";
        ?>
    </main>
</body>
</html>