-- =====================================================
-- StayEase2 - TOUTES LES REQUÊTES D'INSERTION AVEC PHOTOS
-- =====================================================

USE stayease;

-- =====================================================
-- PROPRIÉTAIRES
-- =====================================================

INSERT INTO proprietaire (ID_PROPRIETAIRE, NOM_PROP, PRENOM_PROP, ADRESSE_EMAIL_PROP, MOT_DE_PASSE_PROP, TELEPHONE_PROP) VALUES
(1, 'Melliti', 'Mohamed', 'mohamed.melliti@stayease.tn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 55 123 456'),
(2, 'Bouaziz', 'Sonia', 'sonia.bouaziz@stayease.tn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 55 234 567'),
(3, 'Labidi', 'Ahmed', 'ahmed.labidi@stayease.tn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 55 345 678');

-- =====================================================
-- LOCATAIRES
-- =====================================================

INSERT INTO locataire (ID_LOCATAIRE, NOM_LOC, PRENOM_LOC, ADRESSE_EMAIL_LOC, MOT_DE_PASSE_LOC, TELEPHONE_LOC) VALUES
(0, 'Gaied', 'Nadine', 'NadineGaied@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 99 123 456'),
(1, 'Kaied Chartane', 'Nadine', 'NadineKaiedChartane@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 99 234 567'),
(2, 'Ben Ali', 'Youssef', 'youssef.benali@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 99 345 678'),
(3, 'Sassi', 'Leïla', 'leila.sassi@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+216 99 456 789');

-- =====================================================
-- LOGEMENTS AVEC PHOTOS RÉELLES
-- =====================================================

INSERT INTO logement (ID_LOGEMENT, ID_PROPRIETAIRE, TITRE_LOG, DESCRIPTION_LOGEMENT, ADRESSE_LOG, VILLE_LOG, PRIX_LOG, NB_CHAMBRES, NB_SALLE_BAIN, CAPACITE_MAX, TYPE_LOG, IMAGE_PRINCIPALE, STATUT_LOG, NB_AVIS, NOTE_MOYENNE) VALUES
(1, 1, 'Hôtel à Carthage', 'Le Golden Tulip Carthage Tunis est un hôtel 5 étoiles situé à Carthage, avec vue sur la mer. Chambres luxueuses, piscine extérieure, spa et restaurant gastronomique.', 'Avenue de la République, Carthage', 'Carthage', 350.00, 2, 2, 4, 'hotel', 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200', 'disponible', 3, 4.50),
(2, 1, 'Appartement à Sidi Bou Saïd', 'Charmant appartement avec vue mer, à quelques pas du célèbre village bleu et blanc. Terrasse privée, cuisine équipée, idéal pour couple.', 'Rue de la Marine, Sidi Bou Saïd', 'Sidi Bou Saïd', 120.00, 1, 1, 2, 'appartement', 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1200', 'disponible', 1, 4.20),
(3, 2, 'Hôtel à Hammamet', 'Hôtel Dar Eline à Hammamet - Charme authentique, piscine intérieure, jardin luxuriant, à 5min de la plage.', 'Zone Touristique, Hammamet', 'Hammamet', 180.00, 3, 2, 6, 'hotel', 'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=1200', 'disponible', 2, 4.80),
(4, 2, 'Villa à Djerba', 'Superbe villa avec piscine privée, vue sur mer, located near beach. Perfect for families.', 'Midoun, Djerba', 'Djerba', 450.00, 4, 3, 8, 'villa', 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=1200', 'disponible', 1, 4.90),
(5, 3, 'Maison d''hôte à Tozeur', 'Maison traditionnelle avec architecture troglodyte, patio fleuri, located near desert.', 'Avenue du 7 Novembre, Tozeur', 'Tozeur', 90.00, 2, 1, 4, 'maison_hote', 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1200', 'disponible', 0, 0.00);

-- =====================================================
-- ATTRACTIONS AVEC PHOTOS RÉELLES
-- =====================================================

INSERT INTO attraction_et_reference (ID_ATTRACTION, NOM_ATTRACTION, DESCRIPTION, TYPE_ATT, LOCALISATION, VILLE_ATT, IMAGE_ATTR, DISTANCE_KM) VALUES
('ATTR-1', 'Musée du Bardo', 'Le plus grand musée de la Méditerranée, expositions de mosaïques romaines et artifacts puniques.', 'Musée', 'Tunis', 'Tunis', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1200', 15),
('ATTR-101', 'Musée de Carthage', 'Musée des mosaïques romaines, incontournable à Carthage', 'Musée', 'Carthage', 'Carthage', 'https://images.unsplash.com/photo-1568721024835-63c7f43f0d6b?w=1200', 2),
('ATTR-102', 'Amphithéâtre de Carthage', 'Ruines romaines classées UNESCO', 'Site historique', 'Carthage', 'Carthage', 'https://images.unsplash.com/photo-1568799834543-15a1f5a3653c?w=1200', 3),
('ATTR-103', 'Parc du Belvédère', 'Plus grand parc urbain de Tunis avec vue sur la ville', 'Parc', 'Tunis', 'Tunis', 'https://images.unsplash.com/photo-1568515387631-8b650bbcdb90?w=1200', 10),
('ATTR-104', 'Café Sidi Bou Saïd', 'Café emblématique blanc et bleu, vue mer exceptionnelle', 'Café', 'Sidi Bou Saïd', 'Sidi Bou Saïd', 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=1200', 5),
('ATTR-105', 'Boutiques blanches', 'Maisons bleues et blanches typiques du village', 'Village', 'Sidi Bou Saïd', 'Sidi Bou Saïd', 'https://images.unsplash.com/photo-1583416750470-965b2707b355?w=1200', 5),
('ATTR-106', 'Médina de Hammamet', 'Ancienne médina fortifiée, artisanale locale', 'Médina', 'Hammamet', 'Hammamet', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?w=1200', 8),
('ATTR-107', 'Plage de Hammamet', 'Plage de sable fin, eaux transparentes', 'Plage', 'Hammamet', 'Hammamet', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200', 9),
('ATTR-108', 'Kasbah de Hammamet', 'Forteresse historique avec vue mer', 'Kasbah', 'Hammamet', 'Hammamet', 'https://images.unsplash.com/photo-1523906834658-6e4ef06f64fb?w=1200', 8),
('ATTR-109', 'Plage de Djerba', 'Plage paradisiaque, eaux turquoise', 'Plage', 'Djerba', 'Djerba', 'https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?w=1200', 5),
('ATTR-110', 'Golf de Djerba', 'Parcours 18 trous avec vue mer', 'Golf', 'Djerba', 'Djerba', 'https://images.unsplash.com/photo-1535131749006-b7f58c99034b?w=1200', 7),
('ATTR-111', 'Synagogue de la Ghriba', 'Plus ancienne synagogue d''Afrique', 'Religion', 'Djerba', 'Djerba', 'https://images.unsplash.com/photo-1582794543139-8ac92a900de0?w=1200', 12),
('ATTR-112', 'Médina de Sousse', 'Patrimoine UNESCO, ribat historique', 'Médina', 'Sousse', 'Sousse', 'https://images.unsplash.com/photo-1597211684566-dc42835c2d38?w=1200', 45),
('ATTR-113', 'Ribat de Sousse', 'Forteresse médiévale en bord de mer', 'Site historique', 'Sousse', 'Sousse', 'https://images.unsplash.com/photo-1568721024835-63c7f43f0d6b?w=1200', 44),
('ATTR-114', 'Souk de Sousse', 'Marché traditionnel authentique', 'Souk', 'Sousse', 'Sousse', 'https://images.unsplash.com/photo-1548013146-72479768bada?w=1200', 44),
('ATTR-115', 'Médina de Tunis', 'Vieux Tunis, souks et mosquées', 'Médina', 'Tunis', 'Tunis', 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?w=1200', 18),
('ATTR-116', 'Musée du Bardo (Suite)', 'Plus grand musée de mosaïques au monde', 'Musée', 'Tunis', 'Tunis', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1200', 15),
('ATTR-117', 'Ribat de Monastir', 'Monument historique emblématique', 'Site historique', 'Monastir', 'Monastir', 'https://images.unsplash.com/photo-1568721024835-63c7f43f0d6b?w=1200', 60),
('ATTR-118', 'Mausolée de Bourguiba', 'Tombeau du premier président', 'Mausolée', 'Monastir', 'Monastir', 'https://images.unsplash.com/photo-1568799834543-15a1f5a3653c?w=1200', 62),
('ATTR-119', 'Plage de Monastir', 'Plage familiales aux eaux calmes', 'Plage', 'Monastir', 'Monastir', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200', 61),
('ATTR-120', 'Plage de La Marsa', 'Plage branchée avec bars et restaurants', 'Plage', 'La Marsa', 'La Marsa', 'https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?w=1200', 8),
('ATTR-121', 'Golf de La Marsa', 'Parcours prestige près de Tunis', 'Golf', 'La Marsa', 'La Marsa', 'https://images.unsplash.com/photo-1535131749006-b7f58c99034b?w=1200', 9),
('ATTR-2', 'Sites archéologiques de Carthage', 'Ruines du port punique et romain, classé au patrimoine mondial de l''UNESCO.', 'Site historique', 'Carthage', 'Carthage', 'https://images.unsplash.com/photo-1568799834543-15a1f5a3653c?w=1200', 3),
('ATTR-3', 'Matmata', 'Village troglodyte authentique, découverte du mode de vie traditionnel.', 'Village troglodyte', 'Matmata', 'Matmata', 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1200', 450),
('ATTR-4', 'Ksar Oueddir', 'Forteresse traditionnelle du 14ème siècle, Architecture en terre battue.', 'Ksar', 'Tataouine', 'Tataouine', 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1200', 480),
('ATTR-5', 'Chott el Djerid', 'Lac salé spectaculaire, sunset magique, proche des oasis de Tozeur.', 'Lac salé', 'Tozeur', 'Tozeur', 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200', 30),
('ATTR-D2134B', 'kkkkk', 'hknfj', 'gguhskj', 'yuhjisl', 'Carthage', 'https://images.unsplash.com/photo-1568721024835-63c7f43f0d6b?w=1200', 5);

-- =====================================================
-- ÉVÉNEMENTS AVEC PHOTOS RÉELLES
-- =====================================================

INSERT INTO evenement (ID_EVENEMENT, NOM_EVENEMENT, DESCRIPTION, TYPE_EVENEMENT, LIEU_EVENEMENT, PRIX_MIN_BILLET, PRIX_MAX_BILLET, DATE_DEB_EV, DATE_FIN_EV, VILLE_EV, IMAGE_EV) VALUES
('FEST-CARTHAGE', 'Festival International de Carthage', 'Le plus grand festival culturel de Tunisie. Spectacles de musique, théâtre, danse dans l''amphithéâtre antique de Carthage.', 'Festival', 'Amphithéâtre de Carthage', 30.00, 120.00, '2026-07-01', '2026-08-15', 'Carthage', 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=1200'),
('FEST-ELJEM', 'Festival International d''El Jem', 'Spectacles de musique classique dans l''amphithéâtre romain, expérience inoubliable.', 'Festival', 'Amphithéâtre d''El Jem', 35.00, 100.00, '2026-07-20', '2026-08-10', 'El Jem', 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=1200'),
('FEST-HAMMAMET', 'Festival International de Hammamet', 'Festival de musique et théâtre dans un cadre magnifique, attirer des artistes internationaux.', 'Festival', 'Centre Culturel International', 25.00, 80.00, '2026-07-10', '2026-08-20', 'Hammamet', 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=1200'),
('FEST-TOZEUR', 'Festival des Déserts de Tozeur', 'Music traditional et arts du désert,探索撒哈拉的文化。', 'Festival', 'Tozeur', 20.00, 60.00, '2026-12-20', '2027-01-05', 'Tozeur', 'https://images.unsplash.com/photo-1503902661688-786c7e3b7f50?w=1200'),
('MARATHON-TUNIS', 'Marathon de Tunis', 'Course internationale à travers la capitale, parcours touristique.', 'Sport', 'Tunis', 50.00, 50.00, '2026-04-25', '2026-04-25', 'Tunis', 'https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=1200');

-- =====================================================
-- LIAISONS LOGEMENTS - ATTRACTIONS
-- =====================================================

INSERT INTO logement_attraction (ID_LOGEMENT, ID_ATTRACTION) VALUES 
(1, 'ATTR-1'), (1, 'ATTR-101'), (1, 'ATTR-102'), (1, 'ATTR-103'), (1, 'ATTR-104'), (1, 'ATTR-105'), (1, 'ATTR-2'),
(2, 'ATTR-101'), (2, 'ATTR-102'), (2, 'ATTR-103'), (2, 'ATTR-104'), (2, 'ATTR-105'), (2, 'ATTR-120'), (2, 'ATTR-121'),
(3, 'ATTR-106'), (3, 'ATTR-107'), (3, 'ATTR-108'), (3, 'ATTR-1'), (3, 'ATTR-101'), (3, 'ATTR-102'),
(4, 'ATTR-109'), (4, 'ATTR-110'), (4, 'ATTR-111'), (4, 'ATTR-106'), (4, 'ATTR-107'),
(5, 'ATTR-3'), (5, 'ATTR-4'), (5, 'ATTR-5'), (5, 'ATTR-1');

-- =====================================================
-- LIAISONS LOGEMENTS - ÉVÉNEMENTS
-- =====================================================

INSERT INTO logement_evenement (ID_LOGEMENT, ID_EVENEMENT) VALUES 
(1, 'FEST-CARTHAGE'), (1, 'MARATHON-TUNIS'),
(2, 'FEST-CARTHAGE'),
(3, 'FEST-HAMMAMET'),
(4, 'FEST-TOZEUR'),
(5, 'FEST-TOZEUR');

-- =====================================================
-- RÉSERVATIONS
-- =====================================================

INSERT INTO reservation (ID_RESERVATION, ID_LOCATAIRE, ID_LOGEMENT, DATE_DEB, DATE_FIN, PRIX_TOTAL, STATUT) VALUES
(1, 2, 1, '2025-12-01', '2025-12-07', 2450.00, 'acceptee'),
(2, 3, 2, '2026-01-15', '2026-01-20', 600.00, 'acceptee'),
(3, 1, 1, '2026-02-01', '2026-02-07', 2450.00, 'acceptee'),
(4, 1, 3, '2026-05-01', '2026-05-05', 720.00, 'acceptee'),
(5, 2, 4, '2026-06-10', '2026-06-17', 3150.00, 'acceptee'),
(6, 0, 1, '2025-11-20', '2025-11-25', 1750.00, 'acceptee');

-- =====================================================
-- AVIS LOGEMENTS
-- =====================================================

INSERT INTO avis_logement (ID_AVIS, ID_LOCATAIRE, ID_RESERVATION, ID_LOGEMENT, NOTE_GLOBALE_LOG, NOTE_PROPRETE_LOG, NOTE_EMPLACEMENT_LOG, NOTE_RAPPORT_QUALITE_PRIX_LOG, CONTENU_LOG, TITRE_LOG, DERNIERE_MAJ_LOG) VALUES
(1, 0, 6, 1, 5, 5, 5, 5, 'Excellent séjour dans cet hôtel magnifique. Le personnel était très accueillant et la vue sur la mer était magnifique.', 'Séjour inoubliable', '2025-11-26 10:00:00'),
(2, 2, 1, 1, 4, 4, 5, 4, 'Très belle expérience, Literie confortable et petit-déjeuner excellent. Je recommande!', 'Hôtel sublime', '2025-12-08 15:30:00'),
(3, 3, 2, 2, 4, 4, 4, 4, 'Appartement charmant avec une terrasse magnifique. Parfait pour un couple.', 'Parfait pour weekend en couple', '2026-01-21 09:00:00');

-- =====================================================
-- AVIS ATTRACTIONS
-- =====================================================

INSERT INTO avis_attraction (ID_AVIS_ATT, ID_LOCATAIRE, ID_ATTRACTION, NOTE_GLOBALE_ATT, CONTENU_ATT, DERNIERE_MAJ_ATT) VALUES
(1, 0, 'ATTR-101', 5, 'Musée magnifique, très bien organisé. Les mosaïques sont époustouflantes!', '2025-11-27 14:00:00'),
(2, 2, 'ATTR-1', 4, 'Musée incontournable mais très fréquenté. Prévoir du temps.', '2025-12-09 11:00:00');

-- =====================================================
-- AVIS ÉVÉNEMENTS
-- =====================================================

INSERT INTO avis_evenement (ID_AVIS, ID_LOCATAIRE, ID_EVENEMENT, NOTE_GLOBALE_EV, CONTENU_EV, DERNIERE_MAJ_EV) VALUES
(1, 0, 'FEST-CARTHAGE', 5, 'Spectacle inoubliable dans un cadre exceptionnel!', '2025-11-28 20:00:00');

-- =====================================================
-- VUES
-- =====================================================

CREATE OR REPLACE VIEW v_avis_logement_complet AS
SELECT 
    al.ID_AVIS,
    CONCAT(loc.PRENOM_LOC, ' ', loc.NOM_LOC) AS NOM_COMPLET,
    loc.ADRESSE_EMAIL_LOC,
    al.ID_LOGEMENT,
    lg.TITRE_LOG AS NOM_LOGEMENT,
    lg.VILLE_LOG,
    al.NOTE_GLOBALE_LOG,
    al.NOTE_PROPRETE_LOG,
    al.NOTE_EMPLACEMENT_LOG,
    al.NOTE_RAPPORT_QUALITE_PRIX_LOG,
    al.CONTENU_LOG,
    al.TITRE_LOG AS TITRE_AVIS,
    al.DERNIERE_MAJ_LOG
FROM avis_logement al
JOIN locataire loc ON al.ID_LOCATAIRE = loc.ID_LOCATAIRE
JOIN logement lg ON al.ID_LOGEMENT = lg.ID_LOGEMENT;

-- =====================================================
-- PROCÉDURES
-- =====================================================

DELIMITER //
CREATE PROCEDURE IF NOT EXISTS update_nb_avis_logement(IN p_id_logement INT)
BEGIN
    DECLARE v_count INT;
    SELECT COUNT(*) INTO v_count FROM avis_logement WHERE ID_LOGEMENT = p_id_logement;
    UPDATE logement SET NB_AVIS = v_count WHERE ID_LOGEMENT = p_id_logement;
END //
DELIMITER ;

-- Mise à jour des compteurs d'avis
CALL update_nb_avis_logement(1);
CALL update_nb_avis_logement(2);

SELECT 'Toutes les insertions avec photos terminées!' AS Message;