<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524001601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genders MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON genders');
        $this->addSql('ALTER TABLE genders DROP id');
        $this->addSql('ALTER TABLE genders ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE positions MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON positions');
        $this->addSql('ALTER TABLE positions DROP id');
        $this->addSql('ALTER TABLE positions ADD PRIMARY KEY (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genders ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE positions ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
