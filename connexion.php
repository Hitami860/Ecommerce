<?php
session_start();
require_once("classe/users.php");

$db = new db();
$db->connecte();

if (isset($_POST['submit'])) {

    $name = trim($_POST['name_con']);
    $password = trim($_POST['password_con']);

    if (!empty($name) && !empty($password) || (!empty($email) && !empty($password))) {
        $user = new Users();
        $utilisateur = $user->userConnect(["name" => $name, "password" => $password]);

        if ($utilisateur) {
            $_SESSION['user'] = $utilisateur;
            $message = null;
            header("Location:index.php");
        } else {
            $message = "Nom ou mot de passe incorrect";
        }
    } else {
        $message = "veuillez remplir tous les champs";
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>connexion</title>
</head>



<body>
    <nav>
        <?php include('compo/header.php'); ?>
    </nav>



    <div class="md:w-1/2 max-w-lg mx-auto my-24 px-4 py-5 shadow-none">

        <div class="max-w-md w-full">


            <div class="p-6 rounded-2xl bg-white shadow">
                <h2 class=" text-gray-800 text-3xl font-medium">Connexion</h2>
                <div class="  text-red-700 text-2xl text-center ">
                    <?php if (isset($message)) {
                        echo $message;
                    } ?>
                </div>

                <form class="mt-1 space-y-4" method="post">
                    <div>
                        <label for="name" class="text-gray-800 text-sm mb-2 block">name or email</label>
                        <div class="relative flex items-center">
                            <input name="name_con" type="text" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter name or mail" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                            </svg>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password_con" type="password" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                            </svg>
                        </div>
                    </div>



                    <div class="!mt-8">
                        <button type="submit" name="submit" class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-orange-500 hover:bg-orange-500 focus:outline-none">
                            connexion
                        </button>
                    </div>
                    <p class="text-gray-800 text-sm !mt-8 text-center">pas encore de compte? <a href="sign_in.php" class="text-orange-600 hover:underline ml-1 whitespace-nowrap font-semibold">Inscris toi</a></p>
                </form>
            </div>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </div>
    </div>
    </div>
    </div>




    <footer>
        <?php include('compo/footer.php'); ?>

    </footer>

</body>

</html>