<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313230703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir_formation (contenir_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_4B5A18921982B715 (contenir_id), INDEX IDX_4B5A18925200282E (formation_id), PRIMARY KEY(contenir_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir_promotion (contenir_id INT NOT NULL, promotion_id INT NOT NULL, INDEX IDX_CA0744FC1982B715 (contenir_id), INDEX IDX_CA0744FC139DF194 (promotion_id), PRIMARY KEY(contenir_id, promotion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emarger (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, presence TINYINT(1) NOT NULL, alternative VARCHAR(50) DEFAULT NULL, heure_arrive TIME NOT NULL, heure_depart TIME NOT NULL, INDEX IDX_7EF5C405613FECDF (session_id), INDEX IDX_7EF5C405FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, certification VARCHAR(50) NOT NULL, specialite VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscrire (utilisateur_id INT NOT NULL, promotion_id INT NOT NULL, date_entree DATE NOT NULL, date_sortie DATE DEFAULT NULL, INDEX IDX_84CA37A8FB88E14F (utilisateur_id), INDEX IDX_84CA37A8139DF194 (promotion_id), PRIMARY KEY(utilisateur_id, promotion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, nom_matiere VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, nom_option VARCHAR(50) DEFAULT NULL, INDEX IDX_5A8600B05200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, annee VARCHAR(20) NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_classe (id INT AUTO_INCREMENT NOT NULL, nom_salle VARCHAR(10) NOT NULL, adresse LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, matiere_id INT NOT NULL, salle_classe_id INT NOT NULL, intitule VARCHAR(50) DEFAULT NULL, date_session DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_D044D5D4F46CD258 (matiere_id), INDEX IDX_D044D5D468FAC959 (salle_classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivre (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivre_matiere (suivre_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_263416F71E283B1C (suivre_id), INDEX IDX_263416F7F46CD258 (matiere_id), PRIMARY KEY(suivre_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivre_utilisateur (suivre_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_34DA20181E283B1C (suivre_id), INDEX IDX_34DA2018FB88E14F (utilisateur_id), PRIMARY KEY(suivre_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, civilite TINYINT(1) DEFAULT NULL, nom_usuel VARCHAR(50) NOT NULL, nom_naissance VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, numtel VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contenir_formation ADD CONSTRAINT FK_4B5A18921982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_formation ADD CONSTRAINT FK_4B5A18925200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_promotion ADD CONSTRAINT FK_CA0744FC1982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_promotion ADD CONSTRAINT FK_CA0744FC139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE emarger ADD CONSTRAINT FK_7EF5C405613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE emarger ADD CONSTRAINT FK_7EF5C405FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscrire ADD CONSTRAINT FK_84CA37A8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscrire ADD CONSTRAINT FK_84CA37A8139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B05200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D468FAC959 FOREIGN KEY (salle_classe_id) REFERENCES salle_classe (id)');
        $this->addSql('ALTER TABLE suivre_matiere ADD CONSTRAINT FK_263416F71E283B1C FOREIGN KEY (suivre_id) REFERENCES suivre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivre_matiere ADD CONSTRAINT FK_263416F7F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivre_utilisateur ADD CONSTRAINT FK_34DA20181E283B1C FOREIGN KEY (suivre_id) REFERENCES suivre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivre_utilisateur ADD CONSTRAINT FK_34DA2018FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir_formation DROP FOREIGN KEY FK_4B5A18921982B715');
        $this->addSql('ALTER TABLE contenir_formation DROP FOREIGN KEY FK_4B5A18925200282E');
        $this->addSql('ALTER TABLE contenir_promotion DROP FOREIGN KEY FK_CA0744FC1982B715');
        $this->addSql('ALTER TABLE contenir_promotion DROP FOREIGN KEY FK_CA0744FC139DF194');
        $this->addSql('ALTER TABLE emarger DROP FOREIGN KEY FK_7EF5C405613FECDF');
        $this->addSql('ALTER TABLE emarger DROP FOREIGN KEY FK_7EF5C405FB88E14F');
        $this->addSql('ALTER TABLE inscrire DROP FOREIGN KEY FK_84CA37A8FB88E14F');
        $this->addSql('ALTER TABLE inscrire DROP FOREIGN KEY FK_84CA37A8139DF194');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B05200282E');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4F46CD258');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D468FAC959');
        $this->addSql('ALTER TABLE suivre_matiere DROP FOREIGN KEY FK_263416F71E283B1C');
        $this->addSql('ALTER TABLE suivre_matiere DROP FOREIGN KEY FK_263416F7F46CD258');
        $this->addSql('ALTER TABLE suivre_utilisateur DROP FOREIGN KEY FK_34DA20181E283B1C');
        $this->addSql('ALTER TABLE suivre_utilisateur DROP FOREIGN KEY FK_34DA2018FB88E14F');
        $this->addSql('DROP TABLE contenir');
        $this->addSql('DROP TABLE contenir_formation');
        $this->addSql('DROP TABLE contenir_promotion');
        $this->addSql('DROP TABLE emarger');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE inscrire');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE salle_classe');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE suivre');
        $this->addSql('DROP TABLE suivre_matiere');
        $this->addSql('DROP TABLE suivre_utilisateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
