   <?php

/*
 * The following function will strip the script name from URL
 * i.e. http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
 */
function getCurrentUri()
{
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, - 1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?'))
        $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
}

$base_url = getCurrentUri();
$routes = array();
$routes = explode('/', $base_url);
foreach ($routes as $route) {
    if (trim($route) != '')
        array_push($routes, $route);
}

/*
 * Now, $routes will contain all the routes. $routes[0] will correspond to first route.
 * For e.g. in above example $routes[0] is search, $routes[1] is book and $routes[2] is fitzgerald
 */


//If we're at main page
if ($routes[1] == null) {
    $categoryID = 0;
    $itemID = 0;
    $_SESSION['currentCategory'] = 0;
    $_SESSION['currentItem'] = 0;
    require_once 'view/header/header.php';
    require_once 'view/menu/menu.php';
   require_once "body/bodyGeneral.php";
   require_once 'view/footer/footer.php';
}
//If we're at a certain category but no product
else if ($routes[1] != null && !isset($routes[3])) {
    $categoryID = htmlspecialchars($routes[1]);
    $_SESSION['currentCategory'] = $categoryID;
    require_once 'view/header/header.php';
    require_once 'view/menu/menu.php';
    require_once "body/bodyGeneral.php";
    require_once 'view/footer/footer.php';
}
//If we're at a certain category with a certain product
else if ($routes[3] != null && $routes[1] != null  ) {
    $categoryID = htmlspecialchars($routes[1]);
    $itemID = htmlspecialchars($routes[2]);
    $_SESSION['currentCategory'] = $categoryID;
    $_SESSION['currentItem'] = $itemID;
    require_once 'view/header/header.php';
    require_once 'view/menu/menu.php';
    require_once "body/bodySingleProduct.php";
    require_once 'view/footer/footer.php';
}

?>