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
