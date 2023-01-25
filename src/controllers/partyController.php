<?php
namespace Dsw\Ifriend\Controllers;
require_once('../src/connection.php');

use Dsw\Ifriend\models\Party;
use Dsw\Ifriend\models\User;
use Dsw\Ifriend\models\Assignment;

class partyController {

    public function index(){
      //$parties = Party::all();
      $parties = Party::where('admin_id',$_SESSION['id'])->get();
      global $blade;
      echo $blade->view()->make('party.list', compact('parties'))->render();
    }

    public function create(){
      $users = User::all();
      global $blade;
      echo $blade->view()->make('party.create', compact('users'))->render();
    }

    public function store(){
      $name = $_POST['name'];
      $party = new Party();
      $party->name=$name;
      $party->admin_id= $_SESSION['id'];
      $party->save();
      $participants = $_POST['participants'];
      shuffle($participants);
      for ($i=0; $i < count($participants); $i++) { 
        $assignment = new Assignment;
        $assignment->party_id = $party->id;
        $assignment->user_from = $participants[$i];
        $assignment->user_to = $participants[($i+1) % count($participants)];
        $assignment->save();
      }
      header('Location: /party');
    }
}