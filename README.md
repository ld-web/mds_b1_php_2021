# PHP - Introduction

## Bases

### Tags d'ouverture et fermeture

Pour écrire du code PHP, on doit utiliser la balise d'ouverture `<?php`

Si on écrit du PHP dans du HTML, on doit bien séparer les sections de code PHP en les refermant avec `?>`

Exemple :

```php
//...
<body>
  <h1><?php echo "Hello world"; ?></h1>
  <?php
  $numero = 1;
  echo "Numéro : $numero<br />";
  echo '$numero<br />';
  echo 'Numéro : ' . $numero . '<br />';
  ?>

  <br />
//...
```

### Bases à retenir

> - Les variables commencent par le caractère `$`
> - Les instructions se terminent par un `;`
> - On peut utiliser les guillemets doubles `"` ou simples `'` pour délimiter une chaîne de caractères
> - Quand on utilise des guillemets doubles, on peut directement insérer des variables dans la chaîne, sans les concaténer
> - L'opérateur de concaténation de chaîne en PHP est le point `.`

## Commentaires

En PHP, comme dans n'importe quel langage, il est possible de **commenter** son code.

### Syntaxe

Il y a deux syntaxes possibles :

- Commentaire sur une seule ligne : `// Mon commentaire`
- Commentaire sur plusieurs lignes :

```php
/*
Première ligne
Seconde ligne
*/
```

## Constantes

Une constante en PHP se définir par une valeur **non modifiable**. On peut la déclarer avec le mot-clé `const`.

> On peut aussi utiliser la méthode `define` de la SPL (Standard Php Library)

```php
const MA_CONSTANTE = 4;
```

- Une constante n'est pas préfixée par `$`, comme les variables
- On écrira le nom d'une constante en majuscules

## Tableaux

Un tableau est une suite de valeurs accolées sous forme de **collection**. C'est une structure de données très courante dans les langages de programmation.

```php
<?php
// Déclaration d'un tableau
$monTableau = [1, 2, 3];
```

Pour accéder à un élément du tableau, on peut utiliser la syntaxe suivante, en utilisant un **index** ou encore une **clé**, pour accéder à la **valeur** correspondante :

> Attention, les index non spécifiés sont gérés automatiquement, à partir de `0`.

```php
echo $monTableau[0]; // selon la définition du tableau ci-dessus, on va afficher "1"
```

On peut également définir nos propres clés. Dans ce cas, on déclare un tableau **associatif** :

```php
// clé : 'email', valeur : 'test@test.com'
$user = ['email' => 'test@test.com'];

echo $user['email']; // affichera 'test@test.com'
```

Plusieurs structures de contrôle permettent d'effectuer des actions sur les tableaux (affichage, manipulation).

Généralement, on va utiliser des **boucles** pour afficher chaque élément d'un tableau.

> Voir le fichier `array.php` :
>
> - `for`
> - `while`
> - `foreach`
> - `do...while`

## Comparaison et égalité, différence

Quand on veut vérifier qu'une valeur est égale à une autre en PHP, on va utiliser l'opérateur de comparaison `==`.

On peut également tester l'égalité de manière plus **stricte**, en comparant **à la fois la valeur et le type** des variables. Dans ce cas, on va utiliser `===`.

```php
$a = "3"; // type string
$b = 3; // type int

$a == $b; // Vrai => comparaison sur les valeurs
$a === $b; // Faux => comparaison sur les valeurs ET le type, les types sont différents
```

L'opérateur "différent de" en PHP est `!=`. De la même façon, on pourra comparer de manière stricte 2 variables en utilisant `!==`.

## L'inclusion de fichiers

En PHP, il est possible d'inclure un fichier dans un autre, à l'aide de plusieurs méthodes de la SPL.

Les deux plus couramment utilisées sont [`require`](https://www.php.net/manual/fr/function.require.php) et [`require_once`](https://www.php.net/manual/fr/function.require-once.php).

> ### Lorsqu'on inclut un fichier PHP B dans un autre fichier PHP A, alors on importe tous les symboles (constantes, variables, fonctions...) définis dans B dans le fichier A. Par ailleurs, B peut consommer n'importe quel symbole préalablement défini dans A

On va donc pouvoir séparer les différentes parties de notre script PHP en plusieurs fichiers, afin de découper plus proprement notre application, par exemple :

- Définition des données
- Définition des constantes
- Affichage d'un élément (notre `product_item.php`)
- etc...

## Fonctions

Une fonction est une suite d'instructions nommée, qu'on peut appeler partout où on en a besoin.

```php
<?php
function maFonction(string $param1, string $param2 = 'defaultValue'): string
{
  // Instructions à exécuter
}
```

La ligne de définition d'une fonction contient le mot-clé `function`, le nom de la fonction, ses éventuels paramètres, et son type de retour. Il s'agit de la **signature** de la fonction.

### Paramètres, valeurs par défaut

Les paramètres d'une fonction définissent les valeurs qui seront passées en entrée par le code appelant la fonction.

Il est possible de définir des paramètres **facultatifs**, en spécifiant une valeur par défaut.

```php
<?php
// Définition de la fonction
function direBonjour(string $nom = "Sam") // signature de la fonction
{
  echo "BONJOUR $nom !!!";
}
```

Je peux ainsi appeler la fonction avec ou sans paramètre :

```php
direBonjour("Bob"); // avec un paramètre
direBonjour(); // sans paramètre : valeur par défaut = "Sam"
```

### Valeur de retour

Une fonction peut **retourner une valeur** au code appelant, avec l'instruction `return`.

> L'instruction `return`, quand elle est utilisée, **provoque la sortie** de la fonction

```php
<?php
function paragraphMajuscules(string $val): string
{
  $output = "<p>" . strtoupper($val) . "</p>";
  return $output;
}
```

Dans ce cas, on peut récupérer la valeur retournée dans le code appelant :

```php
// on récupère et on met dans la variable $paragraph la valeur retournée depuis la fonction paragraphMajuscules
$paragraph = paragraphMajuscules("Hello world");
```

## Variables superglobales, paramètres GET

PHP nous permet de réaliser des sites **dynamiques**, c'est-à-dire que, par exemple, si on souhaite visiter la page d'un produit, on peut changer l'URL pour afficher le produit voulu.

La page affichée contiendra donc des informations différentes suivant le contexte de la requête. C'est cela qu'on entend ici par **dynamique**.

### Variables superglobales

Les variables superglobales sont des variables réservées à PHP et gérées par lui-même. Elles s'écrivent sous la forme `$_NOM`.

Les variables superglobales sont des tableaux (arrays). Chaque variable superglobale a un rôle particulier dans la prise de charge de la requête par PHP.

### $\_GET

Le tableau `$_GET` va contenir les paramètres d'URL.

Si je pars de l'URL suivante : `http://mondomaine.com/product.php`, alors je peux ajouter des paramètres à cette URL.

Pour ce faire, à la suite de l'URL, je vais ajouter un point d'interrogation `?`, suivi du nom de mon premier paramètre, le signe `=`, et la valeur du paramètre : `http://mondomaine.com/product.php?monParametre=maValeur`.

Du côté de PHP, quand il reçoit une requête avec une telle URL, il va prendre en charge les paramètres en **mappant** les paramètres d'URL dans le tableau `$_GET`.

> Encore une fois, c'est le rôle du tableau `$_GET`, et ceci est prévu dans le fonctionnement de PHP. Nous verrons petit à petit le rôle des différents tableaux superglobaux

Si je souhaite passer plusieurs paramètres dans mon URL, je peux les séparer par un caractère `&` : `http://mondomaine.com/product.php?monParametre=maValeur&monAutreParametre=monAutreValeur`.

Ce qu'il faut donc retenir :

- Le tableau `$_GET` contient les paramètres d'URL
- Dans l'URL, chaque paramètre est présenté de la manière suivante : `nom=valeur`
- Pour inscrire le premier paramètre dans l'URL, il faut le précéder du caractère `?`
- Pour séparer différents paramètres d'URL, on va utiliser le caractère `&`

> Dans le tableau `$_GET`, les paramètres sont représentés sous forme de tableau associatif : index = nom du paramètre, valeur = valeur du paramètre

### $\_POST

Le tableau `$_POST` contient les variables passées dans le corps de la requête.

> L'utilisation la plus répandue de ce tableau va être avec les formulaires

Ce qu'il est important de retenir, c'est que le tableau `$_POST`, tout comme `$_GET`, est nommé à partir de la méthode HTTP du même nom.

Par défaut, quand on affiche une page web, on utilise la méthode `GET`.

Mais, dans le cas d'un formulaire par exemple, on peut également utiliser la méthode `POST`.

Le fonctionnement est le même que pour la méthode `GET` : les variables passées dans le corps de la requête seront mappées dans le tableau sous forme nom/valeur => clé/valeur.

Voir ci-dessous le chapitre sur les formulaires.

## Formulaires

Les formulaires, en PHP, vont nous permettre de déclencher des traitements à partir de valeurs saisies par l'utilisateur.

Pour ça, on va réceptionner les valeurs dans le tableau `$_GET` ou `$_POST`.

### Méthode

Pour déterminer la méthode HTTP à utiliser, on utilisera l'attribut `method` de la balise `form` :

```html
<form method="POST">...</form>
```

### Cible

On peut également préciser la cible du formulaire : la page qui va réceptionner et traiter les informations saisies. On utilise pour ça l'attribut `action` :

```html
<form action="traitement.php" method="POST">...</form>
```

A la validation du formulaire, le serveur reçoit les données sur la page cible.

Si on utilise la méthode `GET`, alors les valeurs saisies sont reportées dans l'URL, sour forme de variable d'URL.

> Cela peut être utile dans le cas d'un moteur de recherche par exemple, si on souhaite partager l'URL à quelqu'un. Cette URL embarque alors l'ensemble des paramètres que l'on avait saisis dans le formulaire, on peut donc "reproduire" la même recherche directement à partir de l'URL

Si on utilise la méthode `POST`, alors les variables sont passées dans le cors de la requête.

> La méthode `POST` doit être impérativement utilisée pour un formulaire de login par exemple. Les données saisies ne seront pas exposées dans l'URL, mais seront intégrées dans le cors de la requête. Si on utilise HTTPS, ce corps sera donc chiffré et les données qui s'y trouvent également

Dans le fichier cible, on peut récupérer les valeurs du formulaire dans le tableau `$_POST` ou `$_GET`, selon la méthode choisie dans le formulaire :

```php
$email = $_POST['email'];
```

### Champs du formulaire

Dans un formulaire HTML, on encadre l'ensemble des champs par la balise `form`.

Pour qu'on soit capable de retrouver tous les champs de notre formulaire dans la cible qui va les traiter, il est **obligatoire** que chaque champ ait un attribut `name` :

```html
<form action="traitement.php" method="POST">
  <input type="text" name="prenom" />
</form>
```

Dans `traitement.php`, je pourrai récupérer le prénom saisi :

```php
$prenom = $_POST['prenom'];
```

> Attention, si vous oubliez l'attribut `name`, alors le champ ne sera pas récupéré par PHP et vous ne pourrez pas récupérer la valeur saisie !

### Validation

Dans la cible du formulaire, il est nécessaire de valider les données envoyées.

Il est possible d'assurer une validation côté client (navigateur) avec du HTML et l'attribut `required` par exemple.

Cependant, étant donné que l'on ne peut prévoir l'origine d'une requête et son contenu, il est **nécessaire** de prévoir une validation côté serveur, en PHP ici.

#### Présence d'un champ

En premier lieu, il faut s'assurer, si un champ est requis, qu'il est présent dans le tableau superglobal concerné par notre formulaire.

La méthode `empty` peut nous servir à nous assurer de la présence d'un champ dans le tableau, et que sa valeur a bien été renseignée.

```php
if (
  empty($_POST['name']) ||
  empty($_POST['firstname']) ||
  empty($_POST['email']) ||
  empty($_POST['gpdr']) ||
  empty($_POST['subject']) ||
  empty($_POST['message'])
) {
  echo "Vous n'avez pas renseigné toutes les données requises ou bien les données sont incorrectes";
  exit; // exit permet d'arrêter l'exécution du script
}
```

#### Format d'un champ

Au-delà de sa présence, on peut vouloir un certain format pour la valeur d'un champ du formulaire. Par exemple pour un email.

Dans ce cas, il faut également s'assurer, dans la cible, du bon format attendu :

```php
/**
 * Checks if a value has a valid email format
 *
 * @param string $value
 * @return boolean
 */
function isValidEmail(string $value): bool
{
  return (filter_var($value, FILTER_VALIDATE_EMAIL) !== false);
}
```

Ainsi, on peut ajouter cette étape de validation dans notre cible :

```php
if (
  empty($_POST['name']) ||
  empty($_POST['firstname']) ||
  empty($_POST['email']) || !isValidEmail($_POST['email']) ||
  empty($_POST['gpdr']) ||
  empty($_POST['subject']) ||
  empty($_POST['message'])
) {
  echo "Vous n'avez pas renseigné toutes les données requises ou bien les données sont incorrectes";
  exit;
}
```

> Ne pas hésiter, quand c'est possible, à factoriser ces vérifications dans des fonctions pour éviter d'écrire trop de code et "polluer" les fichiers

## Sessions

Les sessions permettent au serveur PHP de reconnaître une session de navigation donnée, donc potentiellement un utilisateur connecté. C'est grâce aux sessions, par exemple, qu'une fois connecté, on n'a pas besoin de se reconnecter à chaque page consultée.

L'identification d'une sessions par le serveur s'effectue par la lecture d'un **cookie**.

Par défaut, ce cookie sera nommé `PHPSESSID`, et contient une valeur aléatoire : l'identifiant de session.

Côté serveur, s'il identifie avec succès un `PHPSESSID`, alors il sera capable de restituer un contexte (un tableau de clés/valeurs) préalablement défini, et qu'on peut faire évoluer au fil des pages consultées.

Ainsi, une session peut suivre un utilisateur durant toute sa navigation sur notre application.

Les sessions permettent de fournir des fonctionnalités comme l'authentification ou un panier de produits par exemple.

Pour utiliser les sessions dans notre application, il est obligatoire d'utiliser en premier lieu la fonction `session_start()` de la SPL.

Si aucune session n'était démarrée, le serveur crée un nouvel identifiant de session et le cookie associé pour le renvoyer au navigateur. Il initialise également la variable superglobale `$_SESSION`, vide par défaut.

S'il existait déjà une session stockée sur le serveur, alors le serveur restitue le tableau `$_SESSION` avec les paires de clés/valeurs que l'on a pu définir pour cet utilisateur (connecté ? Est-ce qu'il y a un panier ? Avec quel(s) produit(s) dedans ? Etc...).

```php
// 1ère exécution : création d'un identifiant de session
// exécutions suivantes : lecture du cookie PHPSESSID et restitution de la session
// Attention : si on n'utilise pas session_start(), le tableau $_SESSION n'est pas défini !
session_start();

// Ici, $_SESSION est vide
var_dump($_SESSION);

$_SESSION['connected'] = false;

// A présent, $_SESSION contient une clé "connected" associée à la valeur false
// Si on recharge la page, alors le var_dump d'avant, qui présentait une session vide, présentera à présent le tableau contenant déjà la clé "connected"
var_dump($_SESSION);
```

> Note importante : si vous appelez `session_start()` plusieurs fois, une erreur sera générée par PHP. Veillez à l'appeler une et une seule fois au début de l'exécution de votre script. Vous pouvez également vous documenter pour trouver un moyen de vérifier si une session a déjà été démarrée, et la démarrer si ce n'est pas le cas
