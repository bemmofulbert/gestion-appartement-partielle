<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Enregistrer un Utilisateur</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/enregistrerUserT.php">
			<div class="headerform"><h1>Enregistrer un utilisateur</h1></div>
            <label for="idUser">Id de L'utilisateur <span>*</span></label>
            <input type="number" name="idUser" id="idUser" placeholder="Id Utilisateur" required>
            <br>
            <div class="headerform">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Login">
            </div>
            <br>
            <div class="headerform">
                    <label for="role">Role</label>
                    <select  name="role" id="role">
                        <option value="">--Role--</option>
                        <option>Moderateur</option>
                        <option>Secretaire</option>
                        <option>Contractant</option>
                        <option>Administrateur</option>
                    </select>
                    <br>
            <div>
            <span>Mot de passe</span>
            <div class="row">
                <div class="col1">
                    <input type="password" name="mdp" id="mdp" placeholder="mot de passe">
                    <br>
                </div>
                <div class="col2">
                    <input type="button" class="btn" id="showBtn" value="Montrer">
                </div>
            </div>
            <div class="button">
            <button type="submit">Enregistrer</button>
			<button type="reset">Annuler</button>
            </div>
        </form>
    </div>
    <style>
        label {
            float: left;
            margin-bottom: 5px;
        }
        .col1 {
            width: 100%
        }
        .col2 {
            width: 15%
        }
        span {
            color: green
        }
    </style>
    <script>
        var btn = document.getElementById("showBtn")
        var pass = document.getElementById("mdp")
        btn.addEventListener("click",() => {
            if(mdp.getAttribute("type") == "password") {
                mdp.setAttribute("type","text")
                btn.setAttribute("value","Cacher")
            }
            else {
                mdp.setAttribute("type","password")
                btn.setAttribute("value","Montrer")
            }
        })
    </script>
</body>
</html>