<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_client', 'root','');
        if(isset($_POST['singin'])){
            $user = htmlspecialchars($_POST['user']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $pw = sha1($_POST['pw']);
            $pw2 = sha1($_POST['pw2']);
                if(!empty($_POST['user']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['pw']) AND  !empty($_POST['pw2'])){
                    $userlength = strlen($user);
                        if ($userlength<=50) {
                            if ($mail == $mail2) {
                                if (filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                                    $reqmail = $bdd->prepare("SELECT * FROM client WHERE mail=? ");
                                    $reqmail->execute(array($mail));
                                    $mailexist = $reqmail->rowCount();
                                    if ($mailexist == 0) {
                                        
                                    if ($pw == $pw2){
                                        $insertclient = $bdd->prepare("INSERT INTO client(user, mail, pw) VALUES(?,?,?)");
                                        $insertclient->execute(array($user,$mail,$pw));
                                        $er ="Your account has succesfly created";

                                    }else    {
                                        $er="Password isnt same!";
                                    }
                                } else {
                                    $er="Adresse mail already used !";
                                } 
                                }else {
                                    $er="Your maill adresses not same !";
                                }
                            }else {
                                $er="Your email adresse donsnt valid !";
                            }
                            }else{
                                $er="Your username dont must be superior to 50 char !";
                            }
                    }else {
                $er="all the champs must complet !";
            }
        }
        include'index1.phtml';
?>