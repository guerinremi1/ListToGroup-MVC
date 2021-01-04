<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<style>
    body{
        display: flex;
        flex-flow: wrap column;
        align-content: center;
        font-size: 20px;
    }
</style>

<body>

<label id='message' for='nb'>Remplir le nombre de groupe</label><br>
<input id='nb' type="text" placeholder="Entrer le nombre de groupe"><br>
<button id='btn' class="btn btn-primary">Charger les groupes</button>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
    var nbgroupe = document.getElementById('nb');
    var btn = document.getElementById('btn');
    var msg = $('#message');
    btn.onclick = click;
    nbgroupe.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            click();
        }
    });
    function click()
    {
        if (!isNaN(nbgroupe.value) && nbgroupe.value != 0){
            //change ?url=groupe/ par /groupe/
            document.location.href= '?url=groupe/'+ nbgroupe.value;
        }else{
            msg.fadeOut();
            msg.fadeIn();
        }
    }

</script>
</html>
