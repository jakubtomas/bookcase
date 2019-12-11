<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';
include_once '_partials/header.php';
?>

<!--poznamka vytvorim stranku ohladom event
1. vypisem zoznam eventov do blokov pozostavajucich s name a podrobnosti a datum
2. Meno bude v linku a po kliknuti na link  sa my zobrazi dana udalost
3. mozno  --- v blokoch sa my zobrazi len časť infotmácii  s podrobnosti a bude tam link na precitanie

4. potrebne urobit insert data, delete update ,select je prvý krok
5.Vytvorit tabulku sql
6.Na hlavnu stranku spravit ten výpis tých udalosti maximalne posledné tri
-->


<?php include_once "_partials/footer.php" ?>