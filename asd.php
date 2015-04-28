<?php
include("header.php");
$q="delimiter //
CREATE TRIGGER upd_check BEFORE UPDATE ON d2d.Contracts
    FOR EACH ROW
     BEGIN
         IF NOT NEW.driverID = OLD.driverID THEN
             SET NEW.dAssigned = now();
         ELSE
             SET NEW.dAssigned = NULL;
         END IF;
     END;//
delimiter ;";
?>