-- Création de la table `roles`
CREATE TABLE `roles` (
                         `role_id` INT AUTO_INCREMENT PRIMARY KEY,
                         `role_name` VARCHAR(255) NOT NULL
);

-- Insertion de données dans la table `roles`
INSERT INTO `roles` (`role_name`) VALUES ('Admin'), ('Candidate');

-- Création de la table `users`
CREATE TABLE `users` (
                         `user_id` INT AUTO_INCREMENT PRIMARY KEY,
                         `username` VARCHAR(255) NOT NULL,
                         `password_hash` VARCHAR(255) NOT NULL,
                         `email` VARCHAR(255) NOT NULL,
                         `role_id` INT,
                         FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`)
);

-- Création de la table `job_offers`
CREATE TABLE `job_offers` (
                              `job_id` INT AUTO_INCREMENT PRIMARY KEY,
                              `title` VARCHAR(255) NOT NULL,
                              `description` TEXT NOT NULL,
                              `is_active` BOOLEAN NOT NULL,
                              `created_at` DATETIME NOT NULL,
                              `updated_at` DATETIME NOT NULL
);

-- Création de la table `applications`
CREATE TABLE `applications` (
                                `application_id` INT AUTO_INCREMENT PRIMARY KEY,
                                `job_id` INT,
                                `user_id` INT,
                                `status` VARCHAR(255) NOT NULL,
                                `applied_on` DATETIME NOT NULL,
                                FOREIGN KEY (`job_id`) REFERENCES `job_offers`(`job_id`),
                                FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
);

-- Création de la table `job_stats`
CREATE TABLE `job_stats` (
                             `stat_id` INT AUTO_INCREMENT PRIMARY KEY,
                             `total_jobs` INT NOT NULL,
                             `active_jobs` INT NOT NULL,
                             `inactive_jobs` INT NOT NULL,
                             `approved_applications` INT NOT NULL
);

-- Exemple d'insertion de données dans la table `job_offers`
INSERT INTO `job_offers` (`title`, `description`, `is_active`, `created_at`, `updated_at`)
VALUES
    ('Software Developer', 'Description for Developer job', 1, NOW(), NOW()),
    ('Graphic Designer', 'Description for Designer job', 1, NOW(), NOW()),
    ('Marketing Specialist', 'Description for Marketing job', 0, NOW(), NOW());

-- Exemple d'insertion de données dans la table `job_stats`
INSERT INTO `job_stats` (`total_jobs`, `active_jobs`, `inactive_jobs`, `approved_applications`)
VALUES
    (10, 7, 3, 5);
