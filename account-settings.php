<?php

$accountIdSession = 4;

require_once 'includes.php';
require_once 'database.php';
if(isset($userName)) {
    $accountObj = new AccountDAO();
    $account = $accountObj->viewAccount($db, $userName);
}

require_once "includes/header.php";


?>
<body>
    <?php 
    require_once "includes/loggedin_sidebar.php";
    ?>
    
    <main>
    <div class="container">  
        <div class="row" id="acctSettForm__cont">
            
            <!--CONTENT GOES IN HERE: Please use the Materialize grid system!-->
    
            <div class="col s12">
                <img src="img/humber-logo-webDevPortal.png" class="portalLogo">
            <form>
                
<div class="col s2">
                        <p><?php echo $account[0]->ProfileImg; ?></p>
                    </div>
                  <div class="file-field input-field col s10">
                    <div class="file-path-wrapper">
                      <input class="file-path" type="text" placeholder="Profile Picture" id="acctSettForm__profilePicture" name="profilePicture">
                    </div>

                    <div class="btn" id="acctSettForm__browse">
                      <span>Browse...</span>
                      <input type="file">
                    </div>

                  </div>

                  <input id="acctSettForm__emailField" type="text" placeholder="<?php echo $account[0]->Email; ?>">
                
                  <input id="acctSettForm__passField" type="password"placeholder="Password" name="Password">
                    <?php if(isset($errorPassword)){ ?>
                    <span><?php echo '<br/>'.$errorPassword;} ?></span>
                
                  <input id="acctSettForm__passConfField" type="password" placeholder="Confirm Password" name="confirmPassword">
                <?php if(isset($errorConfirmPassword)){ ?>
                <span><?php echo '<br/>'.$errorConfirmPassword;} ?></span>

                <!--                 <div class="input-field">
                  <input id="acctSettForm__introField" type="text" placeholder="Personal Description (short)" data-length="10" name="introField">
                    </div>    
                    <div class="input-field">
                    <textarea id="acctSettForm__descField" class="materialize-textarea" data-length="120" placeholder="Personal Description (long)" name="descField"></textarea>
                </div> !-->

                <div class="input-field">
                    <button type="button" data-target="delete-account-modal" class="btn left" id="acctSettForm__delete-account" value="<?php echo $accountIdSession ?>" >Delete Account</button>
                    <input type="submit" value="Save Changes" class="btn right" id="acctSettForm__save" name="editId">
                </div>
            </form>
            </div>

        </div>
    </div>                                 
                
        <!-- Modal Structure -->
  <div id="delete-account-modal" class="modal">
    <div class="modal-content">
      <span class="modal-action modal-close right"><i class="small material-icons">close</i></span>
      <h4>Are you sure you want to delete your account?</h4>
      <p>Once you click delete there is no going back.</p>
    </div>
    <div class="modal-footer">
      <form action="functions/delete-account.php" method="post">
        <button type="submit" id="delete-account-modal__btn-delete-confirm" class="modal-action modal-close waves-effect waves-red btn-flat left" name="delete-account-modal__btn-delete-confirm" value="">Delete</button>
      </form>
      <button id="delete-account-modal__btn-delete-exit" class="modal-action modal-close waves-effect waves-green btn-flat right" value="">Cancel</button>
    </div>
  </div>
      
    </main> 
  
<!--   <script src="js/delete.js"></script> -->
  <script src="js/modal.js"></script>
</body>

<?php

require_once "includes/footer.php";
?>
