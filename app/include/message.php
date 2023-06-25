<?php if(isset($_SESSION['message'])): ?>
      <div class="alert alert-<?php echo($_SESSION['type']) ?>" role="alert">
   <?php echo($_SESSION['message']) ; ?>


   <?php
  unset($_SESSION['message'], $_SESSION['type']);

   ?>
  </div>


<?php endif; ?>
