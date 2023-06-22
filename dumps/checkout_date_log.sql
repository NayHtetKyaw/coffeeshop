DELIMITER //
CREATE TRIGGER after_update_checkout
AFTER UPDATE ON checkout
FOR EACH ROW
BEGIN
    IF NEW.final_price <> OLD.final_price OR NEW.checkout_date <> OLD.checkout_date THEN
        INSERT INTO after_checkout_update_log (order_id, final_price_old, final_price_new, checkout_date_old, checkout_date_new)
        VALUES (NEW.order_id, OLD.final_price, NEW.final_price, OLD.checkout_date, NEW.checkout_date);
    END IF;
END;
//

DELIMITER ;