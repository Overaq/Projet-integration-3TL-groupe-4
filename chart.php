<?php
    include "Constante.php";
    if (isset($_GET['id_serre'])) {
        $reqEtatSerre = $bdd->prepare("SELECT temperature FROM donnee_membres where id_serre = ?");
        $reqEtatSerre->execute(array($_GET['id_serre']));
        $temperature=$reqEtatSerre->fetch();
        foreach ($temperature as $key => $valTemp) {
            $valeur=$valTemp;
        }
        $valeur=explode(";", $valeur);
        $valeursfinal="[";
        foreach ($valeur as $value ){
            $valeursfinal.=$value.",";
        }
        $valeursfinal.="]";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Chart.js demo</title>
<style type="text/css">
</style>     
   <script src='Chart.js'></script>
</head>
    <body>

<canvas id="myChart" width="12" height="5" ></canvas>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php
        for($v=1;$v<sizeof($valeur);$v++){
            echo "' ',";
        }

        ?>],
    datasets: [{
      label: 'apples',
      data: <?php echo $valeursfinal; ?>,
      backgroundColor: "rgba(153,255,255,0.4)"
    }]
  }
});
</script>
</body>
</html>
