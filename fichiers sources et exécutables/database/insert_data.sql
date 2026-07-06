-- Propriétaires
INSERT INTO proprietaire VALUES 
(1, 'Kaied Chartane', 'Nadine', 'NadineKaiedChartane@gmail.com', 'nadine123', '+216 55 123 456'),
(2, 'Mellouli', 'Sami', 'SamiMellouli@gmail.com', 'sami123', '+216 98 234 567'),
(3, 'Ben Ali', 'Youssef', 'YoussefBenAli@gmail.com', 'youssef123', '+216 52 345 678');

-- Locataires
INSERT INTO locataire VALUES 
(1, 'Gaied', 'Nadine', 'NadineGaied@gmail.com', 'nadine123', '+216 99 123 456'),
(2, 'Kaied Chartane', 'Nadine', 'NadineKaiedChartane@gmail.com', 'nadine123', '+216 55 123 456'),
(3, 'Bettaieb', 'Mehdi', 'MehdiBettaieb@gmail.com', 'mehdi123', '+216 55 987 654'),
(4, 'Sassi', 'Leila', 'LeilaSassi@gmail.com', 'leila123', '+216 98 111 222'),
(5, 'Bouazizi', 'Karim', 'KarimBouazizi@gmail.com', 'karim123', '+216 52 333 444'),
(6, 'Trabelsi', 'Amira', 'AmiraTrabelsi@gmail.com', 'amira123', '+216 55 555 666'),
(7, 'Jamous', 'Omar', 'OmarJamous@gmail.com', 'omar123', '+216 98 777 888');

-- Logements
INSERT INTO logement VALUES 
(1, 1, 'Hotel Carthage', 'Hotel 5 etoiles face a la mer avec vue sur la baie de Carthage, piscine exterieure et spa', 'Avenue de la Marine', 'Tunis', 450, 3, 3, 6, 'hotel', 'WiFi,Piscine,Spa,Restaurant,Parking,Climatisation', 'images/photos logement/hotel carthage.jpg', 'disponible', 5, 4.60, 'haute saison'),
(2, 1, 'Hotel Sidi Bou Said', 'Maison dhotes traditionnelle avec vue panoramique sur la mer et les toits bleus du village', 'Rue du village', 'Tunis', 280, 4, 3, 8, 'maison_hotes', 'WiFi,Piscine,Petit dejeuner,Terrasse,Vue mer', 'images/photos logement/hotel sidi Bousaid.jpg', 'disponible', 4, 4.85, 'haute saison'),
(3, 2, 'Hotel Djerba', 'Complexe hotelier face a la plage de Houmt Souk, ideal pour les familles', 'Zone Touristique Houmt Souk', 'Medenine', 180, 3, 2, 6, 'hotel', 'WiFi,Piscine,Plage,Animation,Club enfant', 'images/photos logement/hotel djerba.jpg', 'disponible', 6, 4.30, 'haute saison'),
(4, 2, 'Hotel Jasmine Hammamet', 'Hotel 4 etoiles au centre de Hammamet, proche de la medina et des plages', 'Zone Touristique', 'Nabeul', 220, 2, 2, 4, 'hotel', 'WiFi,Piscine,Spa,Restaurant,Plage', 'images/photos logement/hotel jasmine hammamet.jpg', 'disponible', 8, 4.40, 'haute saison'),
(5, 3, 'Ferme Biologique Tozeur', 'Ferme traditionnelle au milieu des palmiers, immersion totale dans le desert', 'Route de Nefta', 'Tozeur', 95, 2, 1, 4, 'ferme', 'WiFi,Restaurant bio,Visites oasis,Chameau', 'images/photos logement/ferme biologique tozeur.webp', 'disponible', 3, 4.70, 'basse saison'),
(6, 1, 'Hotel Royal Salem Sousse', 'Hotel 4 etoiles centre ville avec vue sur le port de Sousse', 'Boulevard du 14 Janvier', 'Sousse', 190, 2, 2, 4, 'hotel', 'WiFi,Piscine,Spa,Golf,Restaurant', 'images/photos logement/hotel royal salem sousse.jpg', 'disponible', 4, 4.20, 'haute saison'),
(7, 3, 'Maison Dhotes Medina Sousse', 'Maison dhotes authentique dans la medina de Sousse, proche du Ribat', 'Rue de la Kasbah', 'Sousse', 130, 2, 1, 4, 'maison_hotes', 'WiFi,Terrasse,Petit dejeuner,Cuisine', 'images/photos logement/maison dhotes medina sousse.jpg', 'disponible', 2, 4.50, 'basse saison'),
(8, 2, 'Hotel Laico Tunis', 'Hotel 5 etoiles au centre de Tunis, proche du quartier des affaires', 'Avenue Habib Bourguiba', 'Tunis', 350, 2, 2, 4, 'hotel', 'WiFi,Piscine,Spa,Fitness,Restaurant', 'images/photos logement/hotel laico tunis.jpg', 'disponible', 3, 4.50, 'haute saison'),
(9, 3, 'Maison Traditionnelle Kairouan', 'Maison traditionnelle proche de la Grande Mosquee, ideal pour decouvrir Kairouan', 'Rue de la Mosquee', 'Kairouan', 80, 3, 2, 6, 'maison', 'WiFi,Visites guidees,Petit dejeuner', 'images/photos logement/maison traditionnelle kairouan.webp', 'disponible', 1, 4.00, 'basse saison'),
(10, 1, 'Villa Bord de Mer Bizerte', 'Maison de pecheur avec acces direct a la plage et vue sur le port', 'Rue du Port', 'Bizerte', 110, 2, 1, 4, 'maison', 'WiFi,Vue mer,Plage privee,Barbecue', 'images/photos logement/villa bord de mer bizerte.webp', 'disponible', 2, 4.75, 'haute saison')
ON DUPLICATE KEY UPDATE TITRE_LOG = VALUES(TITRE_LOG), DESCRIPTION_LOGEMENT = VALUES(DESCRIPTION_LOGEMENT);

-- Attractions
INSERT INTO attraction_et_reference VALUES
('ATTR-1','Musee du Bardo','Plus grand musee de mosaiques au monde, ancienne residence du bey de Tunis,-situ dans le quartier de la medina','Musee','Tunis','Tunis','images/photos attraction/musee du bardo.webp',8),
('ATTR-2','Medina de Tunis','Vieux Tunis avec ses souks traditionnels et ses ruelles etroites, principaux monuments historiques de la capitale','Medina','Tunis','Tunis','images/photos attraction/medina de tunis.jpg',5),
('ATTR-3','Sites archeologiques de Carthage','Ruines de la cite punique romaine, amphitheatre et thermes de Carthage,patrimoine mondial UNESCO','Site','Carthage','Tunis','images/photos attraction/sites archeologiques de carthage.png',15),
('ATTR-4','Sidi Bou Said','Le plus beau village de Tunisie avec ses maisons bleues et blanches, vue panoramique sur la baie de Tunis','Village','Sidi Bou Said','Tunis','images/photos attraction/sidi bou said.jpg',20),
('ATTR-5','Plage de Hammamet','Plage de sable fin avec eaux cristallines, ideal pour les familles, station balneaire la plusancienne de Tunisie','Plage','Hammamet','Nabeul','images/photos attraction/plage de hammamet.jpg',3),
('ATTR-6','Medina de Hammamet','Medina fortifiee du XVe siecle avec ses ruelles et ses boutiques d artisanat traditionnel','Medina','Hammamet','Nabeul','images/photos attraction/medina de hammamet.jpg',2),
('ATTR-7','Plage de Djerba','Eaux turquoise et sable blanc, une des plus belles plages de Mediterranee,ile tropicale tunisienne','Plage','Houmt Souk','Medenine','images/photos attraction/plage de djerba.jpg',5),
('ATTR-8','Synagogue Ghriba','Plus vieille synagogue d Afrique, site de pelerinage pour la communaute juive,eglise Notre-Dame de la Garde','Religion','Djerba','Medenine','images/photos attraction/synagogue ghriba.jpg',18),
('ATTR-9','Ribat de Sousse','Forteresse du VIIIe siecle classee UNESCO, vue panoramique sur la mer,plus ancien monument de Sousse','Monument','Sousse','Sousse','images/photos attraction/ribat de sousse.jpg',1),
('ATTR-10','Medina de Sousse','Patrimoine UNESCO avec ses temples et ses mosquees,medina historique entouree de murailles','Medina','Sousse','Sousse','images/photos attraction/medina de sousse.jpg',2),
('ATTR-11','Ribat de Monastir','Monument historique du VIIIe siecle avec vue exceptionnelle sur la mer,camp de pelerinage pour les premiers musus','Monument','Monastir','Monastir','images/photos attraction/ribat de sousse.jpg',1),
('ATTR-12','Mausolee de Bourguiba','Tombeau du premier president tunisien Habib Bourguiba,lieu de memoire nationale et pelegrin','Monument','Monastir','Monastir','images/photos attraction/ribat de sousse.jpg',3),
('ATTR-13','Musee de Sfax','Musee d art et d histoire locale, collection de poteries etargenterie traditionnelle','Musee','Sfax','Sfax','images/photos attraction/medina de sousse.jpg',1),
('ATTR-14','Grande Mosquee de Kairouan','Plus importante mosquee de Tunisie et d Afrique du Nord,site UNESCO,fondation en 670 apres J-C','Mosquee','Kairouan','Kairouan','images/photos attraction/grande mosquee de kairouan.jpg',2),
('ATTR-15','Musee des Carpettes','Musee dedie aux tapis traditionnels tunisiens et aux textiles artisanaux de la region','Musee','Kairouan','Kairouan','images/photos attraction/musee des carpettes.jpg',3),
('ATTR-16','Chott Djerid','Lac sale offrant un coucher de soleil magnificent, apparition du desert,plateau sale du Sahara','Nature','Tozeur','Tozeur','images/photos attraction/chot djerid.jpg',25),
('ATTR-17','Oasis de Chebika','Oasis avec cascades et palms,lieu de recreation et de promenade au milieu du desert','Oasis','Chebika','Tozeur','images/photos attraction/oasis de chebika.jpg',35),
('ATTR-18','Village de Matmata','Village troglodyte authentique,habitations creusees dans le roche,lieu de tournage de Star Wars','Village','Matmata','Medenine','images/photos attraction/village de matmata.jpg',120),
('ATTR-19','Port de Bizerte','Port de peche et de plaisance historique,plus grand port de Tunisie,entree de la Mediterrranee','Port','Bizerte','Bizerte','images/photos attraction/port de bizerte.jpg',2),
('ATTR-20','Plage de Skarnes','Plage preservee aux eaux transparentes pres de Monastir,spot ideal pour les amoureux de la mer','Plage','Skarnes','Monastir','images/photos attraction/plage de hammamet.jpg',8);

-- Événements
INSERT INTO evenement VALUES
('FEST-CARTHAGE','Festival international de Carthage','Plus grand festival culturel tunisien avec spectacles et concerts','Festival','Amphitheatre de Carthage',30,150,'2026-07-01','2026-08-15','Tunis','https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&h=500&fit=crop'),
('FEST-HAMMAMET','Festival international de Hammamet','Festival d ete avec theatre et musique','Festival','Theatre de Hammamet',25,80,'2026-07-10','2026-08-20','Nabeul','https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=800&h=500&fit=crop'),
('FEST-SOUSSE','Festival des medinas','Festival dedie aux traditions et artisanale','Festival','Medina de Sousse',15,40,'2026-05-15','2026-05-25','Sousse','https://images.unsplash.com/photo-1548013146-72479768bada?w=800&h=500&fit=crop'),
('FEST-TOZEUR','Festival des deserts','Festival de musique du desert','Festival','Tozeur',20,60,'2026-12-20','2027-01-05','Tozeur','https://images.unsplash.com/photo-1503902661688-786c7e3b7f50?w=800&h=500&fit=crop'),
('MARATHON-TUNIS','Marathon international de Tunis','Course internationale traversant la ville','Sport','Tunis',50,50,'2026-04-25','2026-04-25','Tunis','https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=800&h=500&fit=crop'),
('DJERBA-FEST','Festival culturel de Djerba','Festival estival avec animations et spectacle','Festival','Houmt Souk',15,40,'2026-08-01','2026-08-10','Medenine','https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=800&h=500&fit=crop'),
('KAIROUAN-FEST','Festival du heritage','Festival d artisanat et de culture','Festival','Kairouan',10,25,'2026-03-01','2026-03-10','Kairouan','https://images.unsplash.com/photo-1548013146-72479768bada?w=800&h=500&fit=crop');

-- Réservations
INSERT INTO reservation VALUES 
(1,1,1,'2025-12-20','2025-12-27',3150,'acceptee'),
(2,1,3,'2026-01-10','2026-01-17',1260,'acceptee'),
(3,1,4,'2026-02-15','2026-02-22',1540,'acceptee'),
(4,2,2,'2026-03-10','2026-03-15',1400,'acceptee'),
(5,2,6,'2026-04-20','2026-04-25',950,'acceptee'),
(6,3,1,'2025-11-05','2025-11-12',3150,'acceptee'),
(7,4,10,'2026-01-20','2026-01-27',770,'acceptee'),
(8,5,4,'2026-02-01','2026-02-08',1540,'acceptee'),
(9,6,8,'2025-12-01','2025-12-05',1400,'acceptee'),
(10,7,7,'2026-03-15','2026-03-20',650,'acceptee');

-- Avis logement
INSERT INTO avis_logement VALUES 
(1,1,1,1,5,5,5,5,'Sejour inoubliable vue mer exceptionnelle','Exceptionnel'),
(2,1,2,3,5,5,5,5,'Maison dhotes authentique personnel gentil','Parfait'),
(3,1,3,4,4,4,5,4,'Hotel bien situe proche plage et medina','Bon sejour'),
(4,2,4,2,5,5,5,5,'Vue magnifique sur la baie et les toits bleus','Superbe'),
(5,2,5,6,4,4,5,4,'Hotel elegant petit dejeuner excellent','Excellent'),
(6,3,6,1,5,5,5,5,'Professionnel et confortable je recommande','Magnifique'),
(7,4,7,10,5,5,5,5,'Maison de pecheur typique avec acces plage','Inoubliable'),
(8,5,8,4,4,4,4,4,'Bon hotel mais animation perfectible','Bien'),
(9,6,9,8,4,5,4,4,'Centre ville pratique et personnel efficace','Satisfait'),
(10,7,10,7,5,5,4,5,'Authenticite medina et terrasse magnifique','Aventure magnifique');

-- Avis attraction
INSERT INTO avis_attraction (ID_AVIS_ATT, ID_LOCATAIRE, ID_ATTRACTION, NOTE_GLOBALE_ATT, CONTENU_ATT) VALUES 
(1,1,'ATTR-1',5,'Musee incredible collection de mosaiques'),
(2,1,'ATTR-4',5,'Plus beau village vue panoramique'),
(3,1,'ATTR-5',5,'Plage parfaite eau transparente'),
(4,2,'ATTR-2',4,'Medina authentique et vivante'),
(5,2,'ATTR-11',4,'Vue exceptionnelle sur la mer'),
(6,3,'ATTR-3',5,'Histoire fascinante ruines puniques'),
(7,3,'ATTR-14',5,'Mosquee magnifique visite essentielle'),
(8,4,'ATTR-7',5,'Plage paradisiaque sable blanc'),
(9,4,'ATTR-8',5,'Synagogue historique moment fort'),
(10,5,'ATTR-9',4,'Forteresse impressive vue 360'),
(11,5,'ATTR-16',5,'Coucher de soleil magique sur le Chott'),
(12,6,'ATTR-6',4,'Medina charmante boutiques artisanat'),
(13,6,'ATTR-12',4,'Mausolee lieu de memoire'),
(14,7,'ATTR-17',5,'Oasis cascade superbesbalade'),
(15,7,'ATTR-18',5,'Experience troglodyte unique');

-- Avis événement
INSERT INTO avis_evenement VALUES 
(1,1,'FEST-CARTHAGE',5,'Spectacle unique en plein air'),
(2,1,'FEST-HAMMAMET',4,'Bon festival animations variees'),
(3,2,'MARATHON-TUNIS',4,'Belle course organisation parfaite'),
(4,3,'FEST-CARTHAGE',5,'Soiree fantastique amphitheatre'),
(5,3,'FEST-TOZEUR',5,'Ambiance desert musique traditionnelle'),
(6,4,'DJERBA-FEST',5,'Festival authentique animations locales'),
(7,4,'FEST-HAMMAMET',4,'Theatre en plein air agrable'),
(8,5,'KAIROUAN-FEST',4,'Artisanat traditionnel authentique'),
(9,5,'FEST-SOUSSE',5,'Decouverte medina culture locale'),
(10,6,'MARATHON-TUNIS',4,'Evenement sportif bien organise'),
(11,7,'FEST-CARTHAGE',5,'Spectacles musique classique');

-- Associations logement-attraction
INSERT INTO logement_attraction VALUES (1,'ATTR-1'),(1,'ATTR-2'),(1,'ATTR-3'),(1,'ATTR-4'),(2,'ATTR-3'),(2,'ATTR-4'),(3,'ATTR-7'),(3,'ATTR-8'),(3,'ATTR-18'),(4,'ATTR-5'),(4,'ATTR-6'),(5,'ATTR-16'),(5,'ATTR-17'),(5,'ATTR-18'),(6,'ATTR-9'),(6,'ATTR-10'),(6,'ATTR-11'),(6,'ATTR-12'),(7,'ATTR-9'),(7,'ATTR-10'),(8,'ATTR-1'),(8,'ATTR-2'),(8,'ATTR-3'),(9,'ATTR-14'),(9,'ATTR-15'),(10,'ATTR-19');

-- Associations logement-événement
INSERT INTO logement_evenement VALUES (1,'FEST-CARTHAGE'),(1,'MARATHON-TUNIS'),(2,'FEST-CARTHAGE'),(3,'DJERBA-FEST'),(4,'FEST-HAMMAMET'),(5,'FEST-TOZEUR'),(6,'FEST-SOUSSE'),(6,'MARATHON-TUNIS'),(8,'FEST-CARTHAGE'),(9,'KAIROUAN-FEST');