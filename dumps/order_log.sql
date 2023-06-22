DELIMITER //
CREATE TRIGGER order_update_log
AFTER UPDATE ON orders
FOR EACH ROW
BEGIN
    IF NEW.food <> OLD.food OR NEW.food_quantity <> OLD.food_quantity OR NEW.drink <> OLD.drink OR NEW.drink_quantity <> OLD.drink_quantity OR NEW.notes <> OLD.notes THEN
        INSERT INTO order_update_log (order_id, old_food, new_food, old_food_quantity, new_food_quantity, old_drink, new_drink, old_drink_quantity, new_drink_quantity, old_note, new_note)
        VALUES (NEW.order_id, OLD.food, NEW.food, OLD.food_quantity, NEW.food_quantity, OLD.drink, NEW.drink, OLD.drink_quantity, NEW.drink_quantity, OLD.notes, NEW.notes);
    END IF;
END;
//

DELIMITER ;