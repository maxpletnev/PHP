<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true?  ----откинул 0, так как, нет числа 05, поэтому он преобразует его в 5
    var_dump((int)'012345');     // Почему 12345? ---- принцип тот же
    var_dump((float)123.0 === (int)123.0); // Почему false? потому что, (float)123.0 число с остатком, а (int)123.0 откидвает остаток преобразуя в целое число.
    var_dump((int)0 === (int)'hello, world'); // Почему true?
?>