<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829135733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture_vehicles (id INT AUTO_INCREMENT NOT NULL, used_vehicles_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_770EFCF6AB08BCE2 (used_vehicles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE used_vehicles (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) NOT NULL, mileage INT NOT NULL, date_of_circulation DATE NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture_vehicles ADD CONSTRAINT FK_770EFCF6AB08BCE2 FOREIGN KEY (used_vehicles_id) REFERENCES used_vehicles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture_vehicles DROP FOREIGN KEY FK_770EFCF6AB08BCE2');
        $this->addSql('DROP TABLE picture_vehicles');
        $this->addSql('DROP TABLE used_vehicles');
    }
}
