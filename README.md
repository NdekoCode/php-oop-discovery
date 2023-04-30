
# PHP pour les nuls

## function sur les tableau

- `array_chunk($tableau,$tailleAdiviser)`: est une fonction qui permet de diviser un tableau en morceau d'autre tableau, les morceau à avoir sont spécifier par le deuxième argument
- `array_pop(&$array)` : supprime le dernier element d'un tableau, exemple :`array_pop($tab)`
- `array_shift(&$array)`: supprime le premier element d'un tableau, exemple :`array_shift($tab)`
- `array_push(&$array)`: ajoute un ou plusieurs element à la fin d'un tableau, exemple: `array_push($tab, ...$newUsers);` ou `array_push($tab,"newElement");` `array_push($tab,453);`,...
- `array_unshift(&$array)`: ajoute un ou plusieurs element au début d'un tableau,exemple exemple: `array_unshift($tab, ...$newUsers);` ou `array_unshift($tab,"newElement");` `array_unshift($tab,453);`,...

## Les operateurs

L'operateur combiner:

```{PHP}
$a = 58;
$b = 17;
echo $a < = > $b;
```

Astuces memotechnique `$a < == > $b`:

- Le premier symbole c'est `"<"` donc `"$a<$b"` alors on aura -1,
- Le deuxième symbole c'est `"="` donc `"$a = $b"` alors on aura 0
- Le troisième symbole c'est `">"` donc `"$a > $b"` alors on aura 1
