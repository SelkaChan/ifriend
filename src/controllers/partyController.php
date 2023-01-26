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

    public function show($param) {
      $id = $param['id'];
      $party= Party::find($id);
      $users= User::all();
      $assignment = Assignment::where('party_id',$id)->get();
      if ($party && $assignment) {
        global $blade;
        echo $blade->view()->make('party.show', compact('party','assignment','users'))->render();
      }else{
        echo "<h2>Usuario/asignación no encontrados</h2>";
      }
    }

    public function edit($param) {
      $id = $param['id'];
      $party= Party::find($id);
      $users = User::all();
      $assignment = Assignment::where('party_id',$id)->pluck('user_from');
      //falta añadir los usuarios que ya estan en esa partida para marcarlos

      global $blade;
      echo $blade->view()->make('party.edit', compact('party','users','assignment'))->render();
    }


    //cambiar por el update de parties

    public function update($param) {
      $id = $param['id'];
      $party= Party::find($id);
      $party->name = $_POST['name'];
      $party->save();

      $assignment = Assignment::where('party_id',$id)->delete();
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

    public function destroy($param) {
      $id = $param['id'];
      $party=Party::find($id);
      $assignment = Assignment::where('party_id',$id)->delete();
      $party->delete();
  
      header('Location: /party');
    }
}