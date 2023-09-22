<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230922114836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169F9F24F80 FOREIGN KEY (typeofservices_id) REFERENCES type_of_services (id)');
        $this->addSql('CREATE INDEX IDX_7332E169F9F24F80 ON services (typeofservices_id)');
        $this->addSql('ALTER TABLE type_of_services ADD title VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169F9F24F80');
        $this->addSql('DROP INDEX IDX_7332E169F9F24F80 ON services');
        $this->addSql('ALTER TABLE type_of_services DROP title, DROP description');
    }
}
