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
