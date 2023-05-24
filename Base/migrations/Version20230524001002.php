<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524001002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_types MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON card_types');
        $this->addSql('ALTER TABLE card_types DROP id');
        $this->addSql('ALTER TABLE card_types ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE category MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON category');
        $this->addSql('ALTER TABLE category DROP id');
        $this->addSql('ALTER TABLE category ADD PRIMARY KEY (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_types ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE category ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
