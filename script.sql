-- CREATION DE LA BASE DE DONNEES culture_partagee
CREATE DATABASE culture_partagee; 

USE culture_partagee;

-- CREATION DES TABLES
CREATE TABLE users( 
    id_user INT AUTO_INCREMENT PRIMARY KEY, 
    prenom VARCHAR(50) NOT NULL, 
    nom VARCHAR(50) NOT NULL, 
    telephone VARCHAR(20) NOT NULL, 
    email VARCHAR(100) NOT NULL UNIQUE, 
    password VARCHAR(100) NOT NULL,
    role ENUM('Utilisateur','Auteur','Admin') NOT NULL
);

CREATE TABLE categorie( 
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    nom_categorie VARCHAR(50) NOT NULL UNIQUE, 
    description TEXT, 
    date_creation DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_admin) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Article( 
    id_article INT AUTO_INCREMENT PRIMARY KEY, 
    titre VARCHAR(100) NOT NULL, 
    contenu TEXT NOT NULL, 
    couverture MEDIUMBLOB,
    date_publication DATE NOT NULL DEFAULT CURRENT_DATE, 
    id_categorie INT NOT NULL, 
    id_auteur INT NOT NULL, 
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (id_auteur) REFERENCES users(id_user)ON DELETE CASCADE ON UPDATE CASCADE
);


-- INSERTION DES DONNEES DANS LES TABLES
INSERT INTO users (prenom, nom, telephone, email, password, role) 
VALUES  ('Ahmed', 'Alami', '0612345678', 'ahmed@gmail.com', 'test123', 'Admin'),
        ('Fatima', 'Zahraoui', '0623456789', 'fatima@gmail.com', 'test123', 'Auteur'),
        ('Mohamed', 'Elkhattabi', '0634567890', 'mohamed@gmail.com', 'test123', 'Utilisateur'),
        ('Samira', 'Bennani', '0645678901', 'samira@gmail.com', 'test123', 'Utilisateur'),
        ('Youssef', 'Ouazzani', '0656789012', 'youssef@gmail.com', 'test123', 'Auteur'),
        ('Aicha', 'Chraibi', '0667890123', 'aicha@gmail.com', 'test123', 'Utilisateur'),
        ('Hassan', 'Taoufik', '0678901234', 'hassan@gmail.com', 'test123', 'Auteur'),
        ('Nadia', 'Bakrim', '0689012345', 'nadia@gmail.com', 'test123', 'Utilisateur');


INSERT INTO categorie (id_admin, nom_categorie, description) 
VALUES  (1, 'Éducation', 'Articles sur l\'éducation, les méthodologies d\'enseignement et les stratégies d\'apprentissage.'),
        (1, 'Santé', 'Informations et conseils sur la santé physique, mentale et le bien-être.'),
        (1, 'Littérature', 'Exploration des œuvres littéraires, des critiques et des biographies d\'auteurs.'),
        (1, 'Technologie', 'Actualités et analyses sur les innovations technologiques et leur impact.'),
        (1, 'Voyage', 'Guides, récits et recommandations pour les passionnés de voyages.');


INSERT INTO article (titre, contenu, couverture, id_categorie, id_auteur) 
VALUES  ('L\'importance de l\'éducation inclusive', 'Un aperçu des pratiques éducatives inclusives et de leur impact sur les élèves en difficulté.', NULL, 1, 2),
        ('10 conseils pour une meilleure santé mentale', 'Des astuces pratiques pour réduire le stress et améliorer votre bien-être mental.', NULL, 2, 3),
        ('Analyse de l\'œuvre de Victor Hugo', 'Un regard approfondi sur les thèmes principaux abordés dans les œuvres de Victor Hugo.', NULL, 3, 3),
        ('Les tendances technologiques en 2024', 'Découvrez les innovations qui transforment notre quotidien, du cloud computing à l\'IA.', NULL, 4, 2),
        ('Les plus belles destinations d\'Europe', 'Un guide des lieux incontournables à visiter en Europe pour un séjour mémorable.', NULL, 5, 2);



-- REQUETES

-- Script 1 : Trouver le nombre total d'articles publiés par catégorie.
SELECT C.nom_categorie , COUNT(id_article) AS nbr_articles
FROM categorie C JOIN article A ON C.id_categorie = A.id_categorie
GROUP BY C.nom_categorie;

-- Script 2 : Identifier les auteurs les plus actifs en fonction du nombre d'articles publiés.
SELECT CONCAT(U.prenom,' ',U.nom) AS author , COUNT(A.id_article) AS nbr_articles
FROM users U JOIN article A ON U.id_user = A.id_auteur
GROUP BY author  
ORDER BY nbr_articles DESC;

-- Script 3 : Calculer la moyenne du nombre d'articles publiés par catégorie.
SELECT AVG(nbr_articles) AS moy_nbr_articles
FROM (SELECT C.nom_categorie, COUNT(A.id_article) AS nbr_articles
      FROM categorie C LEFT JOIN article A ON C.id_categorie = A.id_categorie
      GROUP BY C.nom_categorie) AS new_table;

-- Script 4 : Création d'une vue affichant les derniers articles publiés dans les 30 derniers jours
CREATE VIEW derniers_articles AS
SELECT titre, contenu, date_publication, nom_categorie, CONCAT(prenom, ' ', nom) AS auteur
FROM article A
JOIN categorie C ON A.id_categorie = C.id_categorie
JOIN users U ON A.id_auteur = U.id_user
WHERE date_publication >= CURDATE() - INTERVAL 30 DAY;

-- Script 5 : Trouver les catégories qui n'ont aucun article associé
SELECT C.nom_categorie
FROM categorie C LEFT JOIN article A  ON C.id_categorie = A.id_article
GROUP BY C.id_categorie
HAVING COUNT(A.id_article) = 0;