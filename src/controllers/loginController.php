<?php

namespace Dsw\Ifriend\Controllers;

require_once('../src/connection.php');

use Dsw\Ifriend\models\User;

class loginController
{
  public function login()
  {
    $user = User::where([
      ['name', $_POST['name']],
      ['password', $_POST['password']]
    ])->first();
  
    
  if ($user) {
    $_SESSION['id'] = $user->id;
    $_SESSION['name'] = $user->name;
  }else{
    echo "Error al validarte";
  }
  header('Location: /');
  }

  public function logout(){
    session_destroy();
    header('Location: /');
  }
}
