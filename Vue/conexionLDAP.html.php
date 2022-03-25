  

        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                   <!-- bootstrap link-->
            <link rel="stylesheet" href="..CSS/style.css">
               
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
          
          <!-- CSS only -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
          
                <title> Connexion </title>
            </head>
            <body>
               <!-- code php pour la recupération des infos-->
          <?php
          require_once("../Controller/configCo.php") ?>
                
                 <h1 style="text-align:center; font-family: Arial; margin: 40px; padding:0px; color:brown;"> ENTREZ VOS PARAMETRES   </h1> 
                         <br>         
                         
          <div class="container-login-form">
            
              <div class="row">
                  <div class="col-md-4 offset-md-4">
                        
                    <form method="post" action="se connecter.php">
                       <div class="form-group mb-3">
                           <label for="username"> username </label>
                           <input type="text" required  autocomplete="off"
                           name="user name" 
                           placeholder="Entrez votre username"
                           class="form-control"/>
                        </div>
          
          
                        <div class="form-group mb-3">
                           <label for="password"> mot de passe </label>
                          <input type="text" 
                           name="mot de passe" required  autocomplete="off"
                           placeholder="Entrez votre mot de passe"
                           class="form-control"/>   
                               <br>
          
                          
                            <button type="submit" name="connect" class="btn btn-secondary" style="width: 100%;"> 
                                  Se connecter  </button>
                          
                      </form>
                        </div>
                </div>
              </div>
          </div>
                     
            </body>
            </html>
            