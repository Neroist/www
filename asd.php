<?php
include("header.php");
$q="delimiter //
CREATE TRIGGER d2d.upd_check BEFORE UPDATE ON d2d.Contracts
    FOR EACH ROW
     BEGIN
         IF NOT NEW.driverID IS NULL AND OLD.driverID IS NULL THEN
             SET NEW.dAssigned = now();
         ELSE
             SET NEW.dAssigned = NULL;
         END IF;
     END;//
delimiter ;";


$w ="CREATE EVENT settling ON SCHEDULE EVERY 40 SECONDS DO UPDATE d2d.Contracts SET Settled=now() 
WHERE NOT ConfirmedDeliv IS NULL AND Settled IS NULL;";
?>



