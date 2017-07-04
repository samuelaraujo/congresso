DELIMITER //
	CREATE PROCEDURE sp_atualizaingresso (_idingresso int)
BEGIN
	DECLARE qtd_ingresso_disponivel int(11);
	DECLARE qtd_ingresso_vendido int(11);
	
	SELECT qtd INTO qtd_ingresso_disponivel FROM ingresso WHERE id=_idingresso AND status=1;
	SELECT COUNT(id) INTO qtd_ingresso_vendido FROM pagamento WHERE idingresso=_idingresso AND status=1;
	
	IF(qtd_ingresso_vendido >= qtd_ingresso_disponivel)THEN
		UPDATE ingresso SET status=2 WHERE id=_idingresso;
	END IF;
END //
DELIMITER 


DELIMITER //
CREATE TRIGGER tgr_pagamentoefetuado AFTER INSERT ON pagamento
FOR EACH ROW
BEGIN
	CALL sp_atualizaingresso(new.idingresso);
END //
DELIMITER