<?php
// Par défaut, le tableau $_SESSION n'est pas défini.
// Cela signifie que PHP n'a pas démarré de session.
// Ainsi, il faut appeler la méthode de la SPL session_start().
// Lorsqu'une session n'est pas démarrée et qu'on appelle session_start(),
// PHP va chercher s'il existe un PHPSESSID, donc un identifiant de session, dans les cookies.
// S'il ne trouve pas d'identifiant, donc de PHPSESSID, alors il va en créer un, et le renvoyer au client dans un cookie.
// S'il trouve un identifiant de session, donc un cookie PHPSESSID, alors il va restituer le contexte de la session dans le tableau $_SESSION
// Par défaut, le tableau $_SESSION sera vide.
// Nous pourrons écrire des informations dans $_SESSION, contrairement aux tableaux précédemment vus ($_GET, $_POST), que nous utilisions uniquement pour lire des informations entrantes.
session_start();
var_dump($_SESSION);
