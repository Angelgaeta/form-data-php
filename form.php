

<?php
        //connection à la BDD
       
        try{
            $bdd = new PDO('mysql:host=localhost:;dbname=testformulaire;charset=utf8;', '', '');

            //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
            //$conn->setAttribute(PDO::ATT_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "la connection a ete bien etablie.";
        }
            catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
            }

        
        //$reponse = $bdd->query('SELECT * FROM contact');
        $name = $_POST['name'];
        $date = $_POST['date'];
        $adress = $_POST['adress'];

         if(isset($_POST['valider']))
         {
             if(isset($_POST['name']) AND isset($_POST['date']) AND isset($_POST['adress']))//tape bien qq chose
             {
                 if(!empty($_POST['name']) AND !empty($_POST['date']) AND !empty($_POST['adress'])) //si rempli
                { 
                    $stmt = $bdd->prepare ("INSERT INTO `contact` (`name`, `date`, `adress`) VALUES (:name, :date, :adress)");
                    $stmt->execute(array(
                        ':name' => $name, ':date' => $date, ':adress' => $adress));
                  
                        echo "<h2>Hello <b> $name </b> 👋</h2> <h2> merci pour de m'avoir communiqué </h2> <h2> ta date de naissance: <b> $date </b></h2> 
                        <h2> et ton adresse: <b> $adress </b> </h2>";
                    }
                }
            }
        ?>
