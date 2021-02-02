<?php
$users = [
  [
    'login' => 'Florence Owens',
    'email' => 'ke@imevop.sm',
    'account_activated' => true
  ],
  [
    'login' => 'Dustin Lowe',
    'email' => 'keb@vo.sm',
    'account_activated' => true
  ],
  [
    'login' => 'John Ryan',
    'email' => 'sepec@doaweweh.bs',
    'account_activated' => false
  ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="users.css" />
  <title>Utilisateurs</title>
</head>

<body>
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
</body>

</html>