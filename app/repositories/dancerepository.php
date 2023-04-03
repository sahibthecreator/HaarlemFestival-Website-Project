<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';

class DanceRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.id, t.date, t.time, t.session, t.duration, v.vanuesName AS venue, GROUP_CONCAT(a.name) AS artist,t.ticketAvailable ,t.price FROM Tickets t JOIN Venues v ON t.venueId = v.id JOIN DanceArtists da ON da.danceId = t.id JOIN Artists a ON da.artistId = a.id GROUP BY t.id;
            ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function getAllDate(){
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT date FROM Tickets");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }

    }
    function getAllArtist(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Artists");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $artists = $stmt->fetchAll();

            return $artists;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function addDanceTocard($danceId,$userId,$ticketAmount){
        try {
            $stmt = $this->connection->prepare("INSERT INTO CartItems (cartId, itemId, type, quantity) 
            VALUES ('7149e134-9835-4f40-a4a8-194db4ab0982', :danceId, 'ticket', :ticketAmount);");
            $stmt->bindParam(':danceId', $danceId);
            // $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':ticketAmount', $ticketAmount);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
        }
    }
    function getAllByDate($date){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Tickets` WHERE date = :date ORDER BY `Dance`.`id` ASC");
            
            $stmt->bindParam(':date', $date);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function getArtistById(){
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT artist FROM Dance");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getArtistsBySession()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT artist FROM Dance WHERE session = 'Club'");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
            $dances = $stmt->fetchAll();

            return $dances;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }  

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Tickets WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
            $restaurant = $stmt->fetch();

            return $restaurant;

        } catch (PDOException $e) 
        {
            echo $e;
        }
    }
}