<?php
    include 'includes/header.php';
?>
    <header>
        <h1>HN News Network</h1>
    </header>
    <main>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve data from the form
                $search_query = $_POST['search_query'];
                // echo "<p>search_query:" . $search_query . "</p>";
                // Pull article data from database
                $stmt = $mysqli->prepare("select * from articles where title like '%$search_query%' or content like '%$search_query%'");
                if(!$stmt){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt->execute();
                $result = $stmt->get_result();
                $num_rows = $result->num_rows;
                if($num_rows == 0){
                    echo "<p>No results found for: '$search_query'</p>";
                }else{
                    echo "<p>There are $num_rows results for: $search_query</p>";
                    echo "<div class='search-articles'>";
                    while($row = $result->fetch_assoc()){
                        $article_id = $row["article_id"];
                        $articleTitle = $row["title"];
                        $articleImage = $row["image"];
                        $articleAuthor = $row["owner"];
                        $articleContent = $row["content"];
                        $articleSummary = $row["short_desc"];
                        $articleURL = $row["urls"];
                        echo "<div class='article'>";
                        echo "<h2>$articleTitle</h2>";
                        echo "<img src='$articleImage' width='500vw' length='7x50vw' alt='Article Image'>";
                        echo "<p><strong>By:</strong> $articleAuthor</p>";
                        echo "<p>$articleSummary</p>";
                        echo "<form action=\"article.php\" method = \"GET\">
                        <input type=\"hidden\" id=\"article_id\" name=\"article_id\" value='" . $article_id . "'>
                        <input type=\"submit\" value=\"Read More\"?>
                        </form>";
                        echo "</div>";
                    }
                    echo "</div>";
                    
                }
            } else {
                echo "<p>search_query: not set</p>";
            }
        ?>
    </main>

<?php
    include 'includes/footer.php';
?>