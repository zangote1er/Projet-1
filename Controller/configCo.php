<?php
             if(isset($_GET['login_err']))
           {
                $err= htmlspecialchars($_GET['login_err']);
          
             switch($err)
             {
                case "Username"
                ?>
                  <div class="alert alert-danger">
                     <strong> Erreur</strong> Nom d'utilisateur incorrect
               </div>
                <?php
                 break;

                case "password"
              ?>
                <div class="alert alert-danger">
                   <strong> Erreur</strong> mot de passe incorrect
             </div>
              <?php
               break;
          
          
                case "already"
              ?>
                <div class="alert alert-danger">
                   <strong> Erreur</strong> Compte inexistant
             </div>
              <?php
               break;
          
          
             }
          }
           
             ?>