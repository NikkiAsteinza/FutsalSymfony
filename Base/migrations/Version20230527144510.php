<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230527144510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE owner (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38727E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8EE38727E3C61F9 ON club (owner_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64961190A32');
        $this->addSql('DROP INDEX IDX_8D93D64961190A32 ON user');
        $this->addSql('ALTER TABLE user DROP club_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE owner');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38727E3C61F9');
        $this->addSql('DROP INDEX UNIQ_B8EE38727E3C61F9 ON club');
        $this->addSql('ALTER TABLE club DROP owner_id');
        $this->addSql('ALTER TABLE user ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64961190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64961190A32 ON user (club_id)');
    }
}
