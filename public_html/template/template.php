<?php
$location = "Home";
$dir = "./";
$root = $_SERVER["DOCUMENT_ROOT"];
$dirname = dirname($_SERVER['SCRIPT_FILENAME']); 
$host = ucfirst(basename($_SERVER["PHP_SELF"], ".php"));
if ($dirname == $root && $host != "Index") {
    $location = $host;
} else if ($dirname != $root) {
    $location = "Admin";
    $dir = "../";
    if ($dirname != $root . "/admin") {
        $dir = "../../";
    }
} 
$head = "
    <!DOCTYPE html>
    <html lang=\"en\">
        <head>
            <meta charset=\"utf-8\">
            <meta name=\"description\" content=\"Accessibility & PHP CMS Assigment - $location\">
            <meta name=\"author\" content=\"D.C\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title> Accessibility & PHP CMS Assigment - $location </title>
            <link href=\"${dir}css/styles.css\" rel=\"stylesheet\" type=\"text/css\">
        </head>
        <body>
            <header>
                <h1>Accessibility<span>:</span>$location</h1>
                <img
                src=\"${dir}images/header.png\"
                alt=\"Accessibility Logo\"
                width=\"125\"
                height=\"125\"
                />
            </header>
            <a id=\"skip\" href=\"#main\" accesskey=\"S\"> Skip navigation </a>
            <nav>
            <ul>
                <li><a href=\"${dir}\" accesskey=\"1\"> Home </a></li>
                <li><a href=\"${dir}about.php\" accesskey=\"2\"> About </a></li>
                <li><a href=\"${dir}media.php\" accesskey=\"3\"> Media </a></li>
                <li><a href=\"${dir}gallery.php\" accesskey=\"4\"> Gallery </a></li>
                <li><a href=\"${dir}forms.php\" accesskey=\"5\"> Forms </a></li>
                <li><a href=\"${dir}resources.php\" accesskey=\"6\"> Resources </a></li>
                <li>
                    <a href=\"${dir}admin/\" accesskey=\"7\">  
                        <img
                        src=\"${dir}images/login.png\"
                        alt=\"Admin\"
                        width=\"22\"
                        height=\"22\"
                        />
                    </a>
                </li>
            </ul>
            </nav>
            <main id=\"main\">";          
$foot = "
            </main>
            <footer>
                <img
                src=\"${dir}images/footer.png\"
                alt=\"Human Being Icon\"
                width=\"75\"
                height=\"75\"
                />
                <ul>
                    <li><a href=\"${dir}\"> Home </a></li>
                    <li><a href=\"${dir}about.php\"> About </a></li>
                    <li><a href=\"${dir}media.php\"> Media </a></li>
                    <li><a href=\"${dir}gallery.php\"> Gallery </a></li>
                    <li><a href=\"${dir}forms.php\"> Forms </a></li>
                    <li><a href=\"${dir}resources.php\"> Resources </a></li>
                    <li>
                    <a href=\"${dir}admin/\">  
                        <img
                        src=\"${dir}images/login.png\"
                        alt=\"Admin\"
                        width=\"22\"
                        height=\"22\"
                        />
                    </a>
                </li>
                </ul>
            </footer>
        </body>
    </html>";
?>