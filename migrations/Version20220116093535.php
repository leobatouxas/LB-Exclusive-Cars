<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220116093535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création des entités';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boite_vitesse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carburant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crit_air (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, telephone VARCHAR(255) NOT NULL, siren VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage_utilisateur (garage_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_F406C2C3C4FFF555 (garage_id), INDEX IDX_F406C2C3FB88E14F (utilisateur_id), PRIMARY KEY(garage_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, marque_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nb_porte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_14B784184A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, a_propos LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, modele_id INT NOT NULL, carburant_id INT DEFAULT NULL, boite_vitesse_id INT DEFAULT NULL, type_id INT DEFAULT NULL, nb_porte_id INT DEFAULT NULL, crit_air_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, garage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix NUMERIC(6, 2) NOT NULL, description LONGTEXT NOT NULL, annee SMALLINT NOT NULL, kilometrage INT NOT NULL, couleur VARCHAR(255) NOT NULL, puissance_fiscale SMALLINT NOT NULL, puissance_din SMALLINT NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date_annonce DATETIME NOT NULL, en_vente TINYINT(1) NOT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_292FFF1DAC14B70A (modele_id), INDEX IDX_292FFF1D32DAAD24 (carburant_id), INDEX IDX_292FFF1D1BA2F125 (boite_vitesse_id), INDEX IDX_292FFF1DC54C8C93 (type_id), INDEX IDX_292FFF1D1F320A72 (nb_porte_id), INDEX IDX_292FFF1D52F6984D (crit_air_id), INDEX IDX_292FFF1DFB88E14F (utilisateur_id), INDEX IDX_292FFF1DC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE garage_utilisateur ADD CONSTRAINT FK_F406C2C3C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE garage_utilisateur ADD CONSTRAINT FK_F406C2C3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784184A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D32DAAD24 FOREIGN KEY (carburant_id) REFERENCES carburant (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D1BA2F125 FOREIGN KEY (boite_vitesse_id) REFERENCES boite_vitesse (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D1F320A72 FOREIGN KEY (nb_porte_id) REFERENCES nb_porte (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D52F6984D FOREIGN KEY (crit_air_id) REFERENCES crit_air (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D1BA2F125');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D32DAAD24');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D52F6984D');
        $this->addSql('ALTER TABLE garage_utilisateur DROP FOREIGN KEY FK_F406C2C3C4FFF555');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC4FFF555');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DAC14B70A');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D1F320A72');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC54C8C93');
        $this->addSql('ALTER TABLE garage_utilisateur DROP FOREIGN KEY FK_F406C2C3FB88E14F');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DFB88E14F');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784184A4A3511');
        $this->addSql('DROP TABLE boite_vitesse');
        $this->addSql('DROP TABLE carburant');
        $this->addSql('DROP TABLE crit_air');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE garage_utilisateur');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE nb_porte');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vehicule');
    }
}
