<?php
    require_once "../donnees/userManager.php";
    $userManager = new UserManager();
    
    if(isset($_GET['id'])){
    
        $id = $_GET['id'];
        $user = $userManager->getUnique($id);
    
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
    
            $idUser = $_POST['idUser'];
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            $role = $_POST['role'];
            
        
            $user->setIdUser($idUser);
            $user->setLogin($login);
            $user->setMdp($mdp);
            $user->setRole($role);
        
            $userManager->update($user);
    
            header('Location: ../presentation/impression/listeUser.php');
            exit();
        
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../presentation/style.css">
    <title>Modifier un Utilisateur</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br>
    <div id="container">
        <form method="POST" action="../../traitement/enregistrerUserT.php">
			<div class="headerform"><h1>Enregistrer un utilisateur</h1></div>
            <label for="idUser">Id de L'utilisateur <span>*</span></label>
            <input type="number" name="idUser" id="idUser" placeholder="Id Utilisateur" required value="<?php echo $user->getIdUser();?>">
            <br>
            <div class="headerform">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Login" value="<?php echo $user->getLogin();?>">
            </div>
            <br>
            <div class="headerform">
                    <label for="role">Role</label>
                    <select  name="role" id="role">
                        <option value="">--Role--</option>
                        <?php 
                            if($user->getRole() == "Moderateur") echo "<option selected>Moderateur</option>";
                            else echo "<option>Moderateur</option>";

                            if($user->getRole() == "Secretaire") echo "<option selected>Secretaire</option>";
                            else echo "<option>Secretaire</option>";

                            if($user->getRole() == "Contractant") echo "<option selected>Contractant</option>";
                            else echo "<option>Contractant</option>";

                            if($user->getRole() == "Administrateur") echo "<option selected>Administrateur</option>";
                            else echo "<option>Administrateur</option>";
                        ?>
                    </select>
                    <br>
            <div>
            <span>Mot de passe</span>
            <div class="row">
                <div class="col1">
                    <input type="password" name="mdp" id="mdp" placeholder="mot de passe" value="<?php echo $user->getMdp();?>">
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