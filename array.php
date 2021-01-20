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

// --- Boucle while --------------------------------
// $i = 0;
// while ($i < count($users)) {
//   echo $users[$i]['login'] . "<br />";
//   $i++;
// }
// -------------------------------------------------

// --- Boucle do ... while -------------------------
// $i = 0;
// do {
//   echo $users[$i]['login'] . "<br />";
//   $i++;
// } while ($i < count($users));
// -------------------------------------------------

foreach ($users as $monUtilisateur) {
  echo $monUtilisateur['login'] . "<br />";
}
