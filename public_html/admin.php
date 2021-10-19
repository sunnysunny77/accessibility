<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/template/template.php';
echo $head;
if (isset($_POST['action']) && $_POST['action'] == 'Delete Image') {
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'DELETE FROM files WHERE id=:id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Deleted image.';
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Delete Tool') {
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'DELETE FROM tools WHERE id=:id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Deleted tool.';
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Delete Article') {
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'DELETE FROM articles WHERE id=:id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Deleted article.';
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Update Image') {
    include_once $root . '/includes/image.valid.inc.php';
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'UPDATE files 
            SET alt=:alt,caption=:caption
            WHERE id=:id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':alt', $alt);
        $s->bindValue(':caption', $caption);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Database error updating file.';
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    if (is_uploaded_file($_FILES['upload']['tmp_name'])) {
        $uploadfile = $_FILES['upload']['tmp_name'];
        $uploadname = $_FILES['upload']['name'];
        $uploadtype = $_FILES['upload']['type'];
        $uploaddata = file_get_contents($uploadfile);
        try {
            $sql = 'UPDATE files 
                SET filename=:filename,mimetype=:mimetype,filedata=:filedata
                WHERE id=:id';
            $s = $pdo->prepare($sql);
            $s->bindValue(':filename', $uploadname);
            $s->bindValue(':mimetype', $uploadtype);
            $s->bindValue(':filedata', $uploaddata);
            $s->bindValue(':id', $_POST['id']);
            $s->execute();
        }
        catch (PDOException $e) {
            $output = 'Database error storing file.';
            include_once  $root . '/components/error.html.php';
            echo $foot;
            exit();
        }
    }
   
    $res = 'Updated file.';
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Update Tool') {
    include_once $root . '/includes/tool.valid.inc.php';
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'UPDATE tools
        SET tool=:t, toolDescription=:td, toolLink=:tl
        WHERE id=:id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':t', $tool);
        $s->bindValue(':td', $toolDescription);
        $s->bindValue(':tl', $toolLink);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Updated tool.';
    include_once $root . '/components/form.response.html.php'; 
    echo $foot;
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Update Article') {
    include_once $root . '/includes/article.valid.inc.php';
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'UPDATE articles
        SET article=:a, articleDescription=:ad, articleLink=:al
        WHERE id=:id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':a', $article);
        $s->bindValue(':ad', $articleDescription);
        $s->bindValue(':al', $articleLink);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Updated article.' ;
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) and $_POST['action'] == 'Upload') {
    include_once $root . '/includes/image.valid.inc.php';
    if (!is_uploaded_file($_FILES['upload']['tmp_name'])) {
        $output = 'There was no file uploaded.';
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }

    $uploadfile = $_FILES['upload']['tmp_name'];
    $uploadname = $_FILES['upload']['name'];
    $uploadtype = $_FILES['upload']['type'];
    $uploaddata = file_get_contents($uploadfile);

    include_once $root . '/includes/db.inc.php';

    try {
    $sql = 'INSERT INTO files (filename,mimetype,alt,caption,filedata)
        VALUES (:filename,:mimetype,:alt,:caption,:filedata)';
    $s = $pdo->prepare($sql);
    $s->bindValue(':filename', $uploadname);
    $s->bindValue(':mimetype', $uploadtype);
    $s->bindValue(':alt', $alt);
    $s->bindValue(':caption', $caption);
    $s->bindValue(':filedata', $uploaddata);
    $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Database error storing file.';
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Uploaded file.';
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Insert Tool') {
    include_once $root . '/includes/tool.valid.inc.php';
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'INSERT INTO tools SET
        tool = :t,
        toolDescription = :td,
        toolLink = :tl';
        $s = $pdo->prepare($sql);
        $s->bindValue(':t', $tool);
        $s->bindValue(':td', $toolDescription);
        $s->bindValue(':tl', $toolLink);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Inserted tool.'; 
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'Insert Article') {
    include_once $root . '/includes/article.valid.inc.php';
    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'INSERT INTO articles SET
        article = :a,
        articleDescription = :ad,
        articleLink = :al';
        $s = $pdo->prepare($sql);
        $s->bindValue(':a', $article);
        $s->bindValue(':ad', $articleDescription);
        $s->bindValue(':al', $articleLink);
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error performing update: ' . $e->getMessage();
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    $res = 'Inserted article.';
    include_once $root . '/components/form.response.html.php';
    echo $foot; 
    header( "refresh:5;./admin.php" );
    exit();
}
if ($_SESSION['login'] && !isset($_POST['action'])) {
    include_once $root . '/includes/db.inc.php';
    include_once $root . '/includes/resources.inc.php';
    include_once $root . '/components/admin.html.php';
    echo $foot;  
    exit();   
}
if (isset($_POST['action']) && $_POST['action'] == 'Login') {
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $output = "";
    if (empty($user) || empty($pass)) {
        $output .= "Error please fill out all fields. \n\n";
    }
    if (preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $user)) {
        $output .= "Error username includes special characters. \n\n";
    }
    if (strlen($user) > 40) {
        $output .= "Error username is longer than 40 chracters. \n\n";
    }
    if (strlen($pass) > 40) {
        $output .= "Error password is longer than 40 chracters. \n\n";
    }
    if (!empty($output)) {
        include_once  $root . '/components/error.html.php';
        echo $foot;
        header( "refresh:5;./admin.php" );
        exit();  
    }

    include_once $root . '/includes/db.inc.php';
    try {
        $sql = 'SELECT user, pass FROM login WHERE user = :user AND pass = :pass';
        $s = $pdo->prepare($sql);
        $s->bindValue(':user', $user);
        $s->bindValue(':pass', md5($pass . "acms"));
        $s->execute();
    }
    catch (PDOException $e) {
        $output = 'Error selecting credentials.' . $e->getMessage();;
        include_once  $root . '/components/error.html.php';
        echo $foot;
        exit();
    }
    if ($s->rowCount() == 0) {
        $output = "Incorrect credentials.";
        include_once  $root . '/components/error.html.php';
        echo $foot;
        header( "refresh:5;./admin.php" );
        exit();
    }
    $result = $s->fetch();
    $_SESSION['login'] = true;
    $_SESSION['user'] = $result['user'];
    include_once $root . '/includes/resources.inc.php';
    include_once $root . '/components/admin.html.php';
    echo $foot;  
    exit(); 
}
if (!$_SESSION['login']) {
    echo file_get_contents($root . '/components/admin.form.html');
    echo $foot;  
    exit(); 
}
?>