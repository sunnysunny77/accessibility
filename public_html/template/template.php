<?php
$src = './header.image.download.php';
$location = "Home";
$dir = "./";
$host = ucfirst(basename($_SERVER["PHP_SELF"], ".php"));
if ($host != "Index") {
    $location = $host;
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
            <link href=\"./css/styles.css\" rel=\"stylesheet\" type=\"text/css\">
        </head>
        <body>
            <header>
                <h1>Accessibility<span>:</span>$location</h1>
                <img
                src=\"$src\"
                alt=\"Logo\"
                width=\"125\"
                height=\"125\"
                />
            </header>
            <a id=\"skip\" href=\"#main\" accesskey=\"S\"> Skip navigation </a>
            <nav>
            <ul>
                <li><a href=\"./index.php\" accesskey=\"1\"> Home </a></li>
                <li><a href=\"./about.php\" accesskey=\"2\"> About </a></li>
                <li><a href=\"./media.php\" accesskey=\"3\"> Media </a></li>
                <li><a href=\"./gallery.php\" accesskey=\"4\"> Gallery </a></li>
                <li><a href=\"./forms.php\" accesskey=\"5\"> Forms </a></li>
                <li><a href=\"./resources.php\" accesskey=\"6\"> Resources </a></li>
                <li>
                    <a href=\"./admin.php\" accesskey=\"7\">  
                        <img
                        src=\"./images/login.png\"
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
                src=\"./images/footer.png\"
                alt=\"Human Being Icon\"
                width=\"75\"
                height=\"75\"
                />
                <ul>
                    <li><a href=\"./index.php\"> Home </a></li>
                    <li><a href=\"./about.php\"> About </a></li>
                    <li><a href=\"./media.php\"> Media </a></li>
                    <li><a href=\"./gallery.php\"> Gallery </a></li>
                    <li><a href=\"./forms.php\"> Forms </a></li>
                    <li><a href=\"./resources.php\"> Resources </a></li>
                    <li>
                    <a href=\"./admin.php\">  
                        <img
                        src=\"./images/login.png\"
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