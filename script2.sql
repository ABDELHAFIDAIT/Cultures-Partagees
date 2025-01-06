-- CREATION DE LA BASE DE DONNEES culture_connect
CREATE DATABASE IF NOT EXISTS culture_connect; 

USE culture_connect;

-- CREATION DES TABLES
CREATE TABLE users( 
    id_user INT AUTO_INCREMENT PRIMARY KEY, 
    prenom VARCHAR(50) NOT NULL, 
    nom VARCHAR(50) NOT NULL, 
    telephone VARCHAR(20) NOT NULL, 
    email VARCHAR(100) NOT NULL UNIQUE, 
    password VARCHAR(100) NOT NULL,
    role ENUM('Utilisateur','Auteur','Admin') NOT NULL,
    photo VARCHAR(255) NOT NULL,
    isBanned BOOLEAN DEFAULT 0
);

CREATE TABLE categorie( 
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    nom_categorie VARCHAR(50) NOT NULL UNIQUE, 
    description TEXT, 
    date_creation DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_admin) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE article( 
    id_article INT AUTO_INCREMENT PRIMARY KEY, 
    titre VARCHAR(100) NOT NULL, 
    contenu TEXT NOT NULL, 
    couverture VARCHAR(255) NOT NULL,
    date_publication DATE NOT NULL DEFAULT CURRENT_DATE,
    statut ENUM('Accepté','En Attente','Refusé') NOT NULL DEFAULT 'En Attente',
    id_categorie INT NOT NULL, 
    id_auteur INT NOT NULL, 
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (id_auteur) REFERENCES users(id_user)ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE commentaires( 
    id_comment INT AUTO_INCREMENT PRIMARY KEY,
    contenu VARCHAR(255) NOT NULL,
    date_soumission DATE DEFAULT CURRENT_DATE,
    id_article INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_article) REFERENCES article(id_article)ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (id_utilisateur) REFERENCES users(id_user)ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tags( 
    id_tag INT AUTO_INCREMENT PRIMARY KEY,
    nom_tag VARCHAR(20) NOT NULL,
    id_admin INT NOT NULL,
    FOREIGN KEY (id_admin) REFERENCES users(id_user)ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE favoris( 
    id_article INT NOT NULL,
    id_utilisateur INT NOT NULL,
    PRIMARY KEY (id_article,id_utilisateur),
    FOREIGN KEY (id_utilisateur) REFERENCES users(id_user)ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_article) REFERENCES article(id_article)ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE article_tag( 
    id_tag INT NOT NULL,
    id_article INT NOT NULL,
    PRIMARY KEY (id_tag,id_article),
    FOREIGN KEY (id_tag) REFERENCES tags(id_tag)ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_article) REFERENCES article(id_article)ON DELETE CASCADE ON UPDATE CASCADE
);


-- INSERTION DES DONNEES DANS LES TABLES
-- Insertion des Users
INSERT INTO users (prenom, nom, telephone, email, password, role, photo, isBanned) 
VALUES 
('Ahmed', 'ElGhaoui', '0612345678', 'ahmed.elghaoui@example.com', PASSWORD('test123'), 'Admin', 'photo1.jpg', 0),
('Sami', 'BenAli', '0623456789', 'sami.benali@example.com', PASSWORD('test123'), 'Admin', 'photo2.jpg', 0),
('Rachid', 'Zaki', '0634567890', 'rachid.zaki@example.com', PASSWORD('test123'), 'Auteur', 'photo3.jpg', 0),
('Yassine', 'ElAmrani', '0645678901', 'yassine.elamrani@example.com', PASSWORD('test123'), 'Auteur', 'photo4.jpg', 0),
('Omar', 'Boulahya', '0656789012', 'omar.boulahya@example.com', PASSWORD('test123'), 'Auteur', 'photo5.jpg', 0),
('Khalid', 'Cherkaoui', '0667890123', 'khalid.cherkaoui@example.com', PASSWORD('test123'), 'Utilisateur', 'photo6.jpg', 0),
('Nadia', 'Alami', '0678901234', 'nadia.alami@example.com', PASSWORD('test123'), 'Utilisateur', 'photo7.jpg', 0),
('Sofia', 'Amrani', '0689012345', 'sofia.amrani@example.com', PASSWORD('test123'), 'Utilisateur', 'photo8.jpg', 1), -- Utilisateur banni
('Youssef', 'Brahimi', '0690123456', 'youssef.brahimi@example.com', PASSWORD('test123'), 'Utilisateur', 'photo9.jpg', 0);

-- Insertion des catégories
INSERT INTO categorie (id_admin, nom_categorie, description)
VALUES
(1, 'Musique', 'Tout ce qui concerne l\'art musical, des genres aux instruments.'),
(1, 'Peinture', 'Les différents courants et techniques de peinture à travers le temps.'),
(2, 'Cinéma', 'Les films, critiques, et discussions autour du septième art.'),
(3, 'Théâtre', 'Le monde du théâtre, des pièces classiques aux modernes.');

-- Insertion des articles
INSERT INTO article (titre, contenu, couverture, id_categorie, id_auteur)
VALUES
('Les tendances musicales de 2025', 'La musique a évolué de manière spectaculaire en 2025. Nous assistons à une fusion des genres traditionnels et modernes, où des artistes du monde entier explorent de nouvelles sonorités. Le jazz rencontre l\'électro, le classique se mêle au hip-hop, et les influences africaines s\'étendent dans le monde entier.', 'musique1.jpg', 1, 3),
('Peinture contemporaine : Un regard neuf', 'La peinture contemporaine repousse les limites de l\'imagination. Des artistes comme Picasso et Dali ont ouvert des portes pour les générations suivantes, et aujourd\'hui, les jeunes artistes continuent d\'explorer des thèmes d\'abstraction, de réalisme et de minimalisme. Ils utilisent une variété de médiums et de techniques pour exprimer des idées nouvelles et des sentiments profonds.', 'peinture1.jpg', 2, 4),
('Le cinéma d\'auteur : Une nouvelle ère', 'Le cinéma d\'auteur a toujours été un genre recherché par les cinéphiles. Les films d\'auteur sont caractérisés par leur vision unique et personnelle du réalisateur. En 2025, nous voyons un renouveau dans ce genre, avec des cinéastes qui prennent des risques créatifs et abordent des sujets peu explorés dans le cinéma grand public.', 'cinema1.jpg', 3, 5),
('L\'évolution du théâtre moderne', 'Le théâtre a connu des transformations significatives ces dernières années. Les pièces modernes abordent des sujets comme la politique, l\'identité et la technologie, tout en mettant en avant des expériences interactives avec le public. De plus, l\'influence des médias sociaux et des nouvelles technologies transforme la manière dont les spectacles sont présentés.', 'theatre1.jpg', 4, 6),
-- 8 autres articles peuvent être ajoutés de la même manière.

-- Insertion des tags
INSERT INTO tags (nom_tag, id_admin)
VALUES
('Musique', 1),
('Peinture', 1),
('Cinéma', 2),
('Théâtre', 3),
('Jazz', 2),
('Classique', 2),
('Hip-hop', 3),
('Abstraction', 3),
('Réalisme', 3),
('Minimalisme', 4),
('Art contemporain', 4),
('Film d\'auteur', 2),
('Pièce de théâtre', 3),
('Nouveau cinéma', 1),
('Théâtre moderne', 2);

-- Insertion des articles_tag (association d'articles aux tags)
INSERT INTO article_tag (id_tag, id_article)
VALUES
(1, 1), (2, 2), (3, 3), (4, 4),
(5, 1), (6, 2), (7, 3), (8, 4),
(9, 2), (10, 3), (11, 4), (12, 3),
(13, 1), (14, 2), (15, 4);

-- Insertion des favoris (2 articles aimés pour chaque utilisateur)
INSERT INTO favoris (id_article, id_utilisateur)
VALUES
(1, 6), (2, 6), (3, 7), (4, 7),
(1, 8), (2, 8), (3, 9), (4, 9);

-- Insertion des commentaires
INSERT INTO commentaires (contenu, id_article, id_utilisateur)
VALUES
('Super article, j\'ai appris beaucoup de choses sur la musique contemporaine!', 1, 6),
('Très bien écrit, la peinture contemporaine m\'intéresse beaucoup.', 2, 7),
('J\'adore ce genre de cinéma d\'auteur. Merci pour l\'article!', 3, 8),
('Le théâtre moderne est un sujet fascinant, je suis d\'accord avec l\'article.', 4, 9),
('Je ne connaissais pas ce genre musical, très intéressant.', 1, 7),
('Article captivant sur la peinture, je vais chercher plus d\'infos.', 2, 8),
('Merci pour cette analyse approfondie du cinéma d\'auteur, j\'ai appris beaucoup.', 3, 6),
('L\'art du théâtre moderne est fascinant, merci pour cet article.', 4, 7),
('J\'ai adoré lire cet article sur les tendances musicales de 2025.', 1, 9),
('Très bonne analyse de la peinture contemporaine.', 2, 6),
('Le cinéma d\'auteur est vraiment un domaine intéressant, merci pour cet article.', 3, 9),
('Le théâtre moderne devient de plus en plus interactif, intéressant.', 4, 8);