<?php
    include 'includes/header.php';
    session_start();

    if ($_SESSION["LoggedIn"]){
        echo "<br> Hello,  $_SESSION[currUser]! <br>";
    }
    //CREATE TEST DATA ARTICLE FOR TESTING
    $stmt = $mysqli->prepare("select title, short_desc, category, image, article_id from articles where category='politics'");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->execute();

    $result = $stmt->get_result();

    echo "<ul>\n";
    $politicsArticles = array();
    $index = 0;
    while($row = $result->fetch_assoc()){

        $temp = array( $row["title"], $row["image"],  $row["short_desc"]);
        $politicsArticles[$index] = $temp;
        $index++;
        printf("\t<li>%s %s %s</li>\n",
            htmlspecialchars( $row["title"] ),
            htmlspecialchars( $row["image"] ),
            htmlspecialchars( $row["short_desc"] )         
            
        );


    }
    echo "</ul>\n";

    $stmt->close();

    // query database for all articles in politics category
    // query database for all articles in business category
    // query database for all articles in technology category
?>
<div id="home-body">

    <div id="breadking_news">
        <h2 id="breaking_headline">Breaking News</h2>
        <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="400vw" width="700vw" title="PLACEHOLDEr">
        <p>This is a breaking news description!</p>
    </div>

    <section id="category">
        <h2 id="category_name"><u>Politics</u></h2>
        <div class="home-flex-container">
            <?php 
            for ($i = 0; $i < 4; ++$i){
                echo "<section id=\"category-entry\">";
                echo "<h3> $politicsArticles[$i][0] </h3>";
                echo "<img src=$politicsArticles[0][1]) height=\"200vw\" width=\"350vw\" title=\"PLACEHOLDER\">";
                echo "<p>$politicsArticles[$i][2]</p>";
                echo "</section>";
            }
            ?>
            
            <section id="category-entry">
                <h3><?php echo($politicsArticles[1][0]); ?></h3>
                <img src=<?php echo($politicsArticles[1][1]); ?> height="200vw" width="350vw" title="PLACEHOLDEr">
                <p><?php echo($politicsArticles[1][2]); ?></p>
            </section>
        </div>
    </section>

    <section id="category">
        <h2 id="category_name"><u>Business</u></h2>
        <div class="home-flex-container">
            <section id="category-entry">
                <h3>News #1</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
            <section id="category-entry">
                <h3>News #2</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
            <section id="category-entry">
                <h3>News #3</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
            <section id="category-entry">
                <h3>News #4</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
        </div>
    </section>

    <section id="category">
        <h2 id="category_name"><u>Technology</u></h2>
        <div class="home-flex-container">
            <section id="category-entry">
                <h3>News #1</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
            <section id="category-entry">
                <h3>News #2</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
            <section id="category-entry">
                <h3>News #3</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
            <section id="category-entry">
                <h3>News #4</h3>
                <img src="https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg" height="200vw" width="350vw" title="PLACEHOLDEr">
                <p>This is a news article description!</p>
            </section>
        </div>
    </section>
</div>

<?php
    include 'includes/footer.php';
?>