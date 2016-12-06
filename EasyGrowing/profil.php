<?php
session_start();
include "Constante.php";
if(isset($_GET['id']) AND $_GET['id']>0) {
    $getid = intval($_GET['id']);
    $requser= $bdd->prepare('select * From membres Where id = ?');
    $requser->execute(array($getid));
    $userinfo =$requser->fetch();
    ?>
    <!DOCTYPE html>
    <html>
    <?php echo $head ?>
    <body>
    <?php echo $header?>
    <main>
        <div class="centre">
            <h2>Profils de <?php echo $userinfo['pseudo'];?></h2>
            <br>
            Pseudo = <?php echo $userinfo['pseudo'];?>
            <br>
            Mail = <?php echo $userinfo['mail'];?>
            <br><br>Vos plantes :
            <?php
            $requserplante= $bdd->prepare('select nomPlantes, id_m_p From membres INNER JOIN membre_possede_plante as mpp on membres.id=mpp.id_membres INNER JOIN plantes on mpp.id_plantes=plantes.id where membres.id= ?');
            $requserplante->execute(array($getid));
            while($userplante =$requserplante->fetch()){
                echo "<br><a href=\"maPlante.php?id_m_p=".$userplante['id_m_p']."&id=".$_GET['id']."\" class=\"maPlante\">".$userplante['nomPlantes']."</a> [<a href=\"supprimerPlante.php?id=".$userplante['id_m_p']."\" class=\"supprimerPlante\">supprimer ".$userplante['nomPlantes']."</a>]";
            }
            ?>
            <br>
            <?php
            if(isset($_SESSION['id']) AND $userinfo['id']== $_SESSION['id'])
            {
                ?>
                <br>
                <p>Ceci est votre Profil</p>
                <a href="deconnexion.php">Se déconnecter</a>
                <?php
            }
            ?>
        </div>
<p>Flotteur</p>
<p>Température actuelle: </p>
<?php
$requactu= $bdd->prepare('select data_temp ,data_hum, data_time from data_membre where id_membre= ?');
            $requactu->execute(array($getid)); 
$actu =$requactu->fetchAll(PDO::FETCH_ASSOC);

//echo print_r($actu);

function inserData($a,$b){
	$out= "";
	foreach ($b as $cle => $valeur) {
	$out.="'".$valeur[$a]."',";}
	echo substr($out, 0, -1);}

echo end($actu)['data_temp'].'°C';
?>
<p>Humidité actuelle: </p>
<?php echo end($actu)['data_hum'].'%'; ?>
<p>Dernière mise à jour: </p>
<?php echo end($actu)['data_time']; ?> (UTC+1) 
        <canvas id="myChart" width="120" height="50" ></canvas>
    </main>
   <script src='JS/moment.min.js'></script>
    <script src='JS/Chart.js'></script>
    <script>
    Chart.defaults.global.defaultFontColor="#FFF"

var config = {
  type: 'line',
  data: {
    labels: [<?php inserData('data_time',$actu); ?>],
    datasets: [{
      label: "Humidité en %",
      data: [<?php inserData('data_hum',$actu); ?>],
	backgroundColor: "rgba(153,255,255,0.4)"
    }, {
      label: 'Température en °C',
      data: [<?php inserData('data_temp',$actu); ?>],
      backgroundColor: "rgba(255,0,0,0.6)"
    }]
  },
  options: {
    scales: {
      xAxes: [{
        type: 'time'
      }],
    },
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
new Chart(ctx, config);
</script>
    </body>
    </html>
    <?php
}
?>
