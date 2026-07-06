-- Ajouter la colonne added_by aux tables si elle n'existe pas
ALTER TABLE attraction_et_reference ADD COLUMN added_by VARCHAR(150) NULL;
ALTER TABLE evenement ADD COLUMN added_by VARCHAR(150) NULL;