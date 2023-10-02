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
        // printf("\t<li>%s %s %s</li>\n",
        //     htmlspecialchars( $row["title"] ),
        //     htmlspecialchars( $row["image"] ),
        //     htmlspecialchars( $row["short_desc"] ),
        //     htmlspecialchars( $row["article_id"] )        
        // );

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
    }

    echo "</ul>\n";

    $stmt->close();

    $stmt = $mysqli->prepare("SELECT article_id FROM likes WHERE numOfLikes = (SELECT MAX(numOfLikes) FROM likes)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    } 

    $stmt->execute();

    $stmt->bind_result($mostLikedArticleID);

    $stmt->fetch();

    $stmt->close();

    echo "<div id='home-body'>";

    $stmt = $mysqli->prepare("SELECT title, image, short_desc, article_id FROM articles WHERE article_id='$mostLikedArticleID'");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->execute();

    $result = $stmt->get_result();

    $mostLiked = array();

    while($row = $result->fetch_assoc()){
        echo "
        <div id='breadking_news'>
            <h2 id='breaking_headline'>Most Liked Article: " . htmlspecialchars($row['title']) . "</h2>
            <form action='article.php' method='get'>
                <input hidden type='text' id='article_id' name='article_id' value='" . htmlspecialchars($row['article_id']) . "'>
                <input type='image' src='" . htmlspecialchars($row['image']) . "' height='400vw' title='PLACEHOLDER' width='700vw' alt='Submit'>
            </form>
            <p>" . htmlspecialchars($row['short_desc']) . "</p>
        </div>";
    }

    $stmt->close();

    ?>

    <section id="category">
        <h2 id="category_name"><u>Politics</u></h2>
        <div class="home-flex-container">
            <?php for ($i = 0; $i < count($politicsArticles); $i++) { ?>
                <section id="category-entry">
                    <h3><?php echo($politicsArticles[$i][0]); ?></h3>
                    <form action="article.php" method="get">
                        <input hidden type="text" id="article_id" name="article_id" value= <?php echo($politicsArticles[$i][3]); ?>>
                        <input type="image" src=<?php echo($politicsArticles[$i][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                    </form>
                    <p><?php echo($politicsArticles[$i][2]); ?></p>
                </section>
            <?php } ?>
        </div>
    </section>

    <section id="category">
        <h2 id="category_name"><u>Business</u></h2>
        <div class="home-flex-container">
            <?php for ($i = 0; $i < count($businessArticles); $i++) { ?>
                <section id="category-entry">
                    <h3><?php echo($businessArticles[$i][0]); ?></h3>
                    <form action="article.php" method="get">
                        <input hidden type="text" id="article_id" name="article_id" value= <?php echo($businessArticles[$i][3]); ?>>
                        <input type="image" src=<?php echo($businessArticles[$i][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                    </form>
                    <p><?php echo($businessArticles[$i][2]); ?></p>
                </section>
            <?php } ?>
        </div>
    </section>


    <section id="category">
        <h2 id="category_name"><u>Technology</u></h2>
        <div class="home-flex-container">
        <?php for ($i = 0; $i < count($technologyArticles); $i++) { ?>
                <section id="category-entry">
                    <h3><?php echo($technologyArticles[$i][0]); ?></h3>
                    <form action="article.php" method="get">
                        <input hidden type="text" id="article_id" name="article_id" value= <?php echo($technologyArticles[$i][3]); ?>>
                        <input type="image" src=<?php echo($technologyArticles[$i][1]); ?> height="200vw" title="PLACEHOLDER" width="350vw" alt="Submit">
                    </form>
                    <p><?php echo($technologyArticles[$i][2]); ?></p>
                </section>
            <?php } ?>
        </div>
    </section>

    </div>

    <?php
        include 'includes/footer.php';
    ?>

