# Permutation algorithm on PHP

Generates all permutations for defined the number of elements

Example:

```php

<?php

$permutation = new Permutation(3);

foreach ($i = 0; $i <= $permutation->count(); $i++) {
    var_dump($permutation->current()); // array like [0, 1, 2] or [2, 1, 0]
    $permutation->next();
}

var_dump($permutation->getByPos('Some Unique Hash Or Integer'));

```

