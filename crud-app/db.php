<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($Vorname, $Nachname, $Geburtsdatum, $Versicherungen_idVersicherungen, $Versicherungsnummer) {
      $sql = 'INSERT INTO patienten (Vorname, Nachname, Geburtsdatum, Versicherungen_idVersicherungen, Versicherungsnummer) VALUES (:Vorname, :Nachname, :Geburtsdatum, :Versicherungen_idVersicherungen, :Versicherungsnummer)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'Vorname' => $Vorname,
        'Nachname' => $Nachname,
        'Geburtsdatum' => $Geburtsdatum,
        'Versicherungen_idVersicherungen' => $Versicherungen_idVersicherungen,
        'Versicherungsnummer' => $Versicherungsnummer
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM patienten ORDER BY idPatienten DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($idPatienten) {
      $sql = 'SELECT * FROM patienten WHERE idPatienten = :idPatienten';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['idPatienten' => $idPatienten]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($idPatienten, $Vorname, $Nachname, $Geburtsdatum, $Versicherungen_idVersicherungen, $Versicherungsnummer) {
      $sql = 'UPDATE patienten SET Vorname = :Vorname, Nachname = :Nachname, Geburtsdatum = :Geburtsdatum, Versicherungen_idVersicherungen = :Versicherungen_idVersicherungen, Versicherungsnummer = :Versicherungsnummer WHERE idPatienten = :idPatienten';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'Vorname' => $Vorname,
        'Nachname' => $Nachname,
        'Geburtsdatum' => $Geburtsdatum,
        'Versicherungen_idVersicherungen' => $Versicherungen_idVersicherungen,
        'Versicherungsnummer' => $Versicherungsnummer,
        'idPatienten' => $idPatienten
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($idPatienten) {
      $sql = 'DELETE FROM patienten WHERE idPatienten = :idPatienten';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['idPatienten' => $idPatienten]);
      return true;
    }
  }

?>