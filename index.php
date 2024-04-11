<?php
# inicializar una nueva sesion de curl
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

// recibir el resultado de la peticion y no mostrar en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*ejecutar la peticion
  y guaradmos el resultado */
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);



//alternativa es file_get_contents, es decir:
// $result = file_get_contents(API_URL) // es solo para GET de api

?>



<head>
<meta charset="UTF-8" />    
<title>la prox peli de marvel</title> 
<meta name="description" content="la prox pelicula de marvel"/>   
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>



<main>
    <pre style="font-size: 8px; overflow:scroll; height:150px;">
        <?php var_dump($data); ?>
    </pre>
   <section>
    <!-- <img src="https://image.tmdb.org/t/p/w500/uxBHXaoOvAwy4NpPpP7nNx2rXYQ.jpg" alt="deadpool next movie"> -->
    <img src="<?= $data["poster_url"]; ?>" width="300" alt="poster de <?= $data["title"] ?>">
   </section>

   <hgroup>
    <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h2> 
    <p>Fecha de estreno <?= $data["release_date"] ?> </p>
    <p>La siguiente es <?= $data["following_production"]["title"] ?> </p>
   </hgroup>

</main>

<style>
    :root {
        color-scheme: light dark;
    }
    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>