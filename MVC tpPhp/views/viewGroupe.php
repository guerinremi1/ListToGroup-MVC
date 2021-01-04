<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<style>
    body{
        display: flex;
        flex-flow: wrap column;
        align-content: center;
        font-size: 20px;

    }
    .flex{
        display: flex;
        flex-flow: wrap row;
        justify-content: center;
    }
    div{
        width: fit-content;
        margin: 10px;
        padding: 2px;
        border: solid 1px;
    }
    #retour{
        align-self: center;
        width: fit-content;
    }
</style>
<?php
    require_once ('controllers/Router.php');
    try{
        $result = $this->_ctrl->groupe();
        if (!empty($result)) {
            echo '<div class="flex">';

            foreach ($result as $groupe) {

                echo '<div>';

                foreach ($groupe as $eleve) {
                    echo $eleve;
                    echo '<br>';
                }
                echo '</div>';

            }
            echo '</div>';

            echo '<button id="retour" class="btn btn-primary">retour</button>';
        }else{
            throw new Exception('liste vide');
        }
    }catch (Exception $e){
        $S_message = $e->getMessage();
        require_once ('viewErreur.php');
    }



    ?>
<script>
    var btn = document.getElementById('retour');
    btn.onclick = click;
    function click()
    {
        document.location.href= '/';

    }
</script>

</body>
</html