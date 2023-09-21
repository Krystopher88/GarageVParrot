<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920125614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `primary` ON options_vehicles_used_vehicles');
        $this->addSql('ALTER TABLE options_vehicles_used_vehicles ADD PRIMARY KEY (used_vehicles_id, options_vehicles_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `PRIMARY` ON options_vehicles_used_vehicles');
        $this->addSql('ALTER TABLE options_vehicles_used_vehicles ADD PRIMARY KEY (options_vehicles_id, used_vehicles_id)');
    }
}
