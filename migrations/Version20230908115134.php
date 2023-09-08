<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908115134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE options_vehicles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options_vehicles_used_vehicles (options_vehicles_id INT NOT NULL, used_vehicles_id INT NOT NULL, INDEX IDX_C5718468ADA20F4C (options_vehicles_id), INDEX IDX_C5718468AB08BCE2 (used_vehicles_id), PRIMARY KEY(options_vehicles_id, used_vehicles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE options_vehicles_used_vehicles ADD CONSTRAINT FK_C5718468ADA20F4C FOREIGN KEY (options_vehicles_id) REFERENCES options_vehicles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options_vehicles_used_vehicles ADD CONSTRAINT FK_C5718468AB08BCE2 FOREIGN KEY (used_vehicles_id) REFERENCES used_vehicles (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE options_vehicles_used_vehicles DROP FOREIGN KEY FK_C5718468ADA20F4C');
        $this->addSql('ALTER TABLE options_vehicles_used_vehicles DROP FOREIGN KEY FK_C5718468AB08BCE2');
        $this->addSql('DROP TABLE options_vehicles');
        $this->addSql('DROP TABLE options_vehicles_used_vehicles');
    }
}
