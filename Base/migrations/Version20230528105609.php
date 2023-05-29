<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230528105609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON club');
        $this->addSql('ALTER TABLE club DROP id, DROP phone');
        $this->addSql('ALTER TABLE club ADD PRIMARY KEY (cif)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD id INT AUTO_INCREMENT NOT NULL, ADD phone VARCHAR(9) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
