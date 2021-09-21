<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504160434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anketa (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, lat VARCHAR(255) NOT NULL, lng VARCHAR(255) NOT NULL, viens_du VARCHAR(255) DEFAULT NULL, viens_trys VARCHAR(255) DEFAULT NULL, viens_keturi VARCHAR(255) DEFAULT NULL, viens_penki VARCHAR(255) DEFAULT NULL, du_viens VARCHAR(255) DEFAULT NULL, du_du VARCHAR(255) DEFAULT NULL, du_trys VARCHAR(255) DEFAULT NULL, du_keturi VARCHAR(255) DEFAULT NULL, trys_viens VARCHAR(255) DEFAULT NULL, trys_viens_size INT DEFAULT NULL, trys_viens_pastabos VARCHAR(255) DEFAULT NULL, trys_du VARCHAR(255) DEFAULT NULL, trys_du_pastabos VARCHAR(255) DEFAULT NULL, trys_trys VARCHAR(255) DEFAULT NULL, trys_trys_pastabos VARCHAR(255) DEFAULT NULL, trys_keturi VARCHAR(255) DEFAULT NULL, trys_keturi_pastabos VARCHAR(255) DEFAULT NULL, trys_penki VARCHAR(255) DEFAULT NULL, trys_penki_pastabos VARCHAR(255) DEFAULT NULL, trys_sesi VARCHAR(255) DEFAULT NULL, trys_sesi_pastabos VARCHAR(255) DEFAULT NULL, trys_septyni_viens VARCHAR(255) DEFAULT NULL, trys_septyni_viens_km INT DEFAULT NULL, trys_septyni_du VARCHAR(255) DEFAULT NULL, trys_septyni_du_km INT DEFAULT NULL, trys_septyni_trys VARCHAR(255) DEFAULT NULL, trys_septyni_trys_km INT DEFAULT NULL, trys_septyni_keturi VARCHAR(255) DEFAULT NULL, trys_septyni_keturi_km INT DEFAULT NULL, trys_septyni_pastabos VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE anketa');
    }
}
