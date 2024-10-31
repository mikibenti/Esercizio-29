<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambio</title>
</head>
<body>
    <?php
        $values = array("¥" => 165.70, "$" => 1.08, "CHF" => 0.94, "£" => 0.83);
        $days = array("1" => "Lunedì", "2" => "Martedì","3" => "Mercoledì","4" => "Giovedì","5" => "Venerdì","6" => "Sabato","7" => "Domenica");
        $flags = array("¥" => "ja-flag.gif", "$" => "us-flag.gif", "CHF" => "sz-flag.gif", "£" => "uk-flag.gif");
        $currency = $_GET["valuta"];
        $importEU = intval($_GET["importo"]);
        $date = date("d-m-Y");
        $dayOfTheWeek = date('w',strtotime($date));
        $typeCommission = "";
        if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
            $commissions = $importEU*0.025;
            $typeCommission = " --> Commissione non Maggiorata";
        } else {
            $commissions = $importEU*0.05;
            $typeCommission = " --> Commissione Maggiorata";
        }
        $import = $importEU - $commissions;
        $finalImport = $import * $values["$currency"];
        echo "<p>Data di Oggi : $date</p>
              <p>Giorno della Settimana : ".$days["$dayOfTheWeek"]."</p>
              <p>Importo in Euro : $importEU €</p>
              <img src='./images/it-flag.gif' alt='image' id='flag'>
              <p>Importo escluse le commissioni : $import €</p>
              <img src='./images/".$flags["$currency"]."' alt='image' id='flag'>
              <p>Commissioni di Cambio : $commissions € $typeCommission</p>
              <p>Importo Cambiato : $finalImport $currency</p>";
    ?>
    <a href="./valuta.html">Torna Indietro</a>
</body>
</html>