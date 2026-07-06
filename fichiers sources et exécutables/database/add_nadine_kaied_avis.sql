-- Ajouter Nadine Kaied Chartane comme locataire
INSERT INTO locataire (ID_LOCATAIRE, NOM_LOC, PRENOM_LOC, ADRESSE_EMAIL_LOC, MOT_DE_PASSE_LOC, TELEPHONE_LOC) VALUES
(2, 'Kaied Chartane', 'Nadine', 'NadineKaiedChartane@gmail.com', 'nadine123', '+216 55 123 456');

-- Ajouter ses réservations (avec toutes les colonnes)
INSERT INTO reservation (ID_RESERVATION, ID_LOCATAIRE, ID_LOGEMENT, DATE_DEB, DATE_FIN, PRIX_TOTAL, STATUT) VALUES
(6, 2, 3, '2026-03-10', '2026-03-15', 720.00, 'acceptee'),
(7, 2, 7, '2026-04-20', '2026-04-25', 950.00, 'acceptee');

-- Ajouter ses avis logement
INSERT INTO avis_logement (ID_AVIS, ID_LOCATAIRE, ID_RESERVATION, ID_LOGEMENT, NOTE_GLOBALE_LOG, NOTE_PROPRETE_LOG, NOTE_EMPLACEMENT_LOG, NOTE_RAPPORT_QUALITE_PRIX_LOG, CONTENU_LOG, TITRE_LOG, DERNIERE_MAJ_LOG) VALUES
(6, 2, 6, 3, 4, 5, 4, 4, 'Super appartement au centre de Tunis. Très bien situé, proche de toutes les commodités. Je recommande!', 'Appartement idéal', '2026-03-16 10:00:00'),
(7, 2, 7, 7, 5, 5, 5, 4, 'Hôtel magnifique avec vue sur mer. Personnel très professionnel, piscine excellente.', 'Excellent séjour', '2026-04-26 14:00:00');

-- Ajouter ses avis attraction
INSERT INTO avis_attraction (ID_AVIS_ATT, ID_LOCATAIRE, ID_ATTRACTION, NOTE_GLOBALE_ATT, CONTENU_ATT, DERNIERE_MAJ_ATT) VALUES
(7, 2, 'ATTR-7', 5, 'Médina incroyable! Pleine de vie et de couleurs. A voir absolument!', '2026-03-12 15:00:00'),
(8, 2, 'ATTR-18', 4, 'Ribat très bien préservé. Vue panoramique exceptionnelle sur la mer.', '2026-04-22 11:00:00');

-- Ajouter ses avis événement
INSERT INTO avis_evenement (ID_AVIS, ID_LOCATAIRE, ID_EVENEMENT, NOTE_GLOBALE_EV, CONTENU_EV, DERNIERE_MAJ_EV) VALUES
(6, 2, 'MARATHON-TUNIS', 4, 'Belle course à travers Tunis. Organisation parfaite!', '2026-04-25 16:00:00');

SELECT 'Données ajoutées avec succès!' AS Message;