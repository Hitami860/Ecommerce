<?php
session_start();
require_once("config/db.php");
require_once("classe/users.php");

$db = new db();
$db->connecte();


if (isset($_POST['envoyer'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $name = htmlspecialchars(trim($_POST['name_ins']));

    $newUser = new Users();
    $newUser->setEmail($email);
    $newUser->setPassword(password_hash($password, PASSWORD_BCRYPT));
    $newUser->setName($name);
    $newUser->addUsers();
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>inscription</title>
</head>

<body>
    <nav>
        <?php include('compo/header.php'); ?>
    </nav>

    <div class="flex min-h-screen bg-white">





        <div class="md:w-1/2 max-w-lg mx-auto my-24 px-4 py-5 shadow-none">

            <div class="text-left p-0 font-sans">

                <h1 class=" text-gray-800 text-3xl font-medium">Créé un compte gratuitement</h1>
                <h3 class="p-1 text-gray-700">Gratuit à vie, pas de payement ensuite</h3>
            </div>
            <form action="" method="post" class="p-0">
                <div class="mt-5">

                    <input type="mail" name="email" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600 " placeholder="Email">
                </div>
                <div class="mt-5">
                    <input type="text" name="name_ins" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="name">
                </div>
                <div class="mt-5">
                    <input type="password" name="password" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600  " placeholder="Mot de passe">
                </div>



                <div class="mt-10">
                    <input type="submit" name="envoyer" href="index.php" value="S'inscrire avec son email" class="py-3 bg-orange-500 text-white w-full rounded hover:bg-orange-600">
                </div>
            </form>
            <a href="connexion.php" data-test="Link"><span class="block  p-5 text-center text-gray-800  text-xs ">Tu as déja un compte ?</span></a>
        </div>


    </div>



    <footer>
        <?php include('compo/footer.php'); ?>

    </footer>

</body>


</html>