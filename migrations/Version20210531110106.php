<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531110106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producteur ADD illustration1 VARCHAR(255) NOT NULL, ADD illustration2 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recette CHANGE difficulte difficulte VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producteur DROP illustration1, DROP illustration2');
        $this->addSql('ALTER TABLE recette CHANGE difficulte difficulte INT NOT NULL');
    }
}
