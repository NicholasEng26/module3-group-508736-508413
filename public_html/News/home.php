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

        $temp = array( $row["title"], $row["image"],  $row["short_desc"], $row["article_id"] );
        $politicsArticles[$index] = $temp;
        $index++;
        printf("\t<li>%s %s %s</li>\n",
            htmlspecialchars( $row["title"] ),
            htmlspecialchars( $row["image"] ),
            htmlspecialchars( $row["short_desc"] ),
            htmlspecialchars( $row["article_id"] )        
        );

    }
    echo "</ul>\n";

    $stmt->close();

    $stmt = $mysqli->prepare("select title, short_desc, category, image, article_id from articles where category='business'");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->execute();

    $result = $stmt->get_result();

    echo "<ul>\n";
    $businessArticles = array();
    $index = 0;


    while($row = $result->fetch_assoc()){

        $temp = array( $row["title"], $row["image"],  $row["short_desc"], $row["article_id"] );
        $businessArticles[$index] = $temp;
        $index++;
        printf("\t<li>%s %s %s</li>\n",
            htmlspecialchars( $row["title"] ),
            htmlspecialchars( $row["image"] ),
            htmlspecialchars( $row["short_desc"] ),
            htmlspecialchars( $row["article_id"] )        
        );

    }
    echo "</ul>\n";

    $stmt->close();

    $stmt = $mysqli->prepare("select title, short_desc, category, image, article_id from articles where category='technology'");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->execute();

    $result = $stmt->get_result();

    echo "<ul>\n";
    $technologyArticles = array();
    $index = 0;


    while($row = $result->fetch_assoc()){

        $temp = array( $row["title"], $row["image"],  $row["short_desc"], $row["article_id"] );
        $technologyArticles[$index] = $temp;
        $index++;
        printf("\t<li>%s %s %s</li>\n",
            htmlspecialchars( $row["title"] ),
            htmlspecialchars( $row["image"] ),
            htmlspecialchars( $row["short_desc"] ),
            htmlspecialchars( $row["article_id"] )        
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
            <section id="category-entry">
                <h3><?php echo($politicsArticles[0][0]); ?></h3>
                <form action="article.php" method="post">
                    <input hidden type="text" id="article_id" name="article_id" value= <?php echo($politicsArticles[0][3]); ?>>
                    <input type="image" src=<?php echo($politicsArticles[0][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                </form>
                <p><?php echo($politicsArticles[0][2]); ?></p>
            </section>
            <section id="category-entry">
                <h3><?php echo($politicsArticles[1][0]); ?></h3>
                <form action="article.php" method="post">
                    <input hidden type="text" id="article_id" name="article_id" value= <?php echo($politicsArticles[1][3]); ?>>
                    <input type="image" src=<?php echo($politicsArticles[1][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                </form>
                <p><?php echo($politicsArticles[1][2]); ?></p>
            </section>
            <section id="category-entry">
                <h3><?php echo($politicsArticles[2][0]); ?></h3>
                <form action="article.php" method="post">
                    <input hidden type="text" id="article_id" name="article_id" value= <?php echo($politicsArticles[2][3]); ?>>
                    <input type="image" src=<?php echo($politicsArticles[2][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                </form>
                <p><?php echo($politicsArticles[2][2]); ?></p>
            </section>
            <section id="category-entry">
                <h3><?php echo($politicsArticles[3][0]); ?></h3>
                <form action="article.php" method="post">
                    <input hidden type="text" id="article_id" name="article_id" value= <?php echo($politicsArticles[3][3]); ?>>
                    <input type="image" src=<?php echo($politicsArticles[3][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                </form>
                <p><?php echo($politicsArticles[3][2]); ?></p>
            </section>
        </div>
    </section>

    <section id="category">
        <h2 id="category_name"><u>Business</u></h2>
        <div class="home-flex-container">
        <section id="category-entry">
                <h3><?php echo($businessArticles[0][0]); ?></h3>
                <form action="article.php" method="post">
                    <input hidden type="text" id="article_id" name="article_id" value= <?php echo($businessArticles[0][3]); ?>>
                    <input type="image" src=<?php echo($businessArticles[0][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                </form>
                <p><?php echo($businessArticles[0][2]); ?></p>
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