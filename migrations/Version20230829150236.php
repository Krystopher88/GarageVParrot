<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829150236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE used_vehicles ADD brand_vehicle_id INT DEFAULT NULL, ADD fuel_type_vehicle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE used_vehicles ADD CONSTRAINT FK_D5F37C556E8C310F FOREIGN KEY (brand_vehicle_id) REFERENCES brand_vehicle (id)');
        $this->addSql('ALTER TABLE used_vehicles ADD CONSTRAINT FK_D5F37C55DF4A216C FOREIGN KEY (fuel_type_vehicle_id) REFERENCES fuel_type_vehicle (id)');
        $this->addSql('CREATE INDEX IDX_D5F37C556E8C310F ON used_vehicles (brand_vehicle_id)');
        $this->addSql('CREATE INDEX IDX_D5F37C55DF4A216C ON used_vehicles (fuel_type_vehicle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE used_vehicles DROP FOREIGN KEY FK_D5F37C556E8C310F');
        $this->addSql('ALTER TABLE used_vehicles DROP FOREIGN KEY FK_D5F37C55DF4A216C');
        $this->addSql('DROP INDEX IDX_D5F37C556E8C310F ON used_vehicles');
        $this->addSql('DROP INDEX IDX_D5F37C55DF4A216C ON used_vehicles');
        $this->addSql('ALTER TABLE used_vehicles DROP brand_vehicle_id, DROP fuel_type_vehicle_id');
    }
}
