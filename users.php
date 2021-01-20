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
    'account_activated' => false
  ],
  [
    'login' => 'John Ryan',
    'email' => 'sepec@doaweweh.bs',
    'account_activated' => true
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
    <div class="user-card">
      <p class="login">
        Mon Login
      </p>
      <p class="email">
        Mon e-mail
      </p>
      <div class="account">
        <div class="activated"></div>
        <div class="lblActivated">Compte activé</div>
      </div>
    </div>
    <div class="user-card">
      <p class="login">
        Mon Login
      </p>
      <p class="email">
        Mon e-mail
      </p>
      <div class="account">
        <div class="disabled"></div>
        <div class="lblDisabled">Compte désactivé</div>
      </div>
    </div>
    <div class="user-card">
      <p class="login">
        Mon Login
      </p>
      <p class="email">
        Mon e-mail
      </p>
    </div>
    <div class="user-card">
      <p class="login">
        Mon Login
      </p>
      <p class="email">
        Mon e-mail
      </p>
    </div>
    <div class="user-card">
      <p class="login">
        Mon Login
      </p>
      <p class="email">
        Mon e-mail
      </p>
    </div>
  </div>
</body>

</html>