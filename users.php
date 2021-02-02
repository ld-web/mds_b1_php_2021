<?php
require 'data/users.php'; // Inclusion du fichier users.php

// Inclusion UNIQUE du fichier header.php
require_once 'layout/header.php';
?>

<h1>Utilisateurs</h1>

<div id="users">
  <?php foreach ($users as $user) { ?>
    <div class="user-card">
      <p class="login">
        <?php echo $user['login']; ?>
      </p>
      <p class="email">
        <?php echo $user['email']; ?>
      </p>
      <div class="account">
        <?php if ($user['account_activated']) { ?>
          <div class="activated"></div>
          <div class="lblActivated">Compte activé</div>
        <?php } else { ?>
          <div class="disabled"></div>
          <div class="lblDisabled">Compte désactivé</div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</div>

<?php require 'layout/footer.php'; ?>