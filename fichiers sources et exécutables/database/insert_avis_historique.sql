--Verifier les donnees existantes avant insertion
SELECT MAX(ID_AVIS) as max_id FROM avis_logement;
SELECT MAX(ID_AVIS_ATT) as max_id FROM avis_attraction;

-- Inserer des avis logement pour Nadine Gaied (ID 0)
INSERT INTO avis_logement (ID_AVIS, id_locataire, id_logement, CONTENU_LOG, NOTE_GLOBALE_LOG, DERNIERE_MAJ_LOG) VALUES 
(6, 0, 1, 'Sejour parfait, personnel aux petits soins.', 5.0, '2026-03-10');

INSERT INTO avis_logement (ID_AVIS, id_locataire, id_logement, CONTENU_LOG, NOTE_GLOBALE_LOG, DERNIERE_MAJ_LOG) VALUES 
(7, 0, 3, 'Belle experience, cadre magnifique.', 4.0, '2026-03-25');

-- Historique pour Nadine Gaied (ID 0)
INSERT INTO reservation (id_locataire, id_logement, date_deb, date_fin) VALUES 
(0, 1, '2026-03-05', '2026-03-12');

INSERT INTO reservation (id_locataire, id_logement, date_deb, date_fin) VALUES 
(0, 2, '2026-04-10', '2026-04-15');

-- Inserer des avis sur attractions pour Nadine Gaied (ID 0)
INSERT INTO avis_attraction (ID_AVIS_ATT, id_locataire, id_attraction, CONTENU_ATT, NOTE_GLOBALE_ATT, DERNIERE_MAJ_ATT) VALUES
(3, 0, 'ATTR-102', 'Tres belle ruine, endroits a visiter!', 5.0, '2026-03-15');

INSERT INTO avis_attraction (ID_AVIS_ATT, id_locataire, id_attraction, CONTENU_ATT, NOTE_GLOBALE_ATT, DERNIERE_MAJ_ATT) VALUES
(4, 0, 'ATTR-104', 'Endroit romantique, cafe excellent', 4.0, '2026-04-01');