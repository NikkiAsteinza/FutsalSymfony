<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524005720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE defense_type MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON defense_type');
        $this->addSql('ALTER TABLE defense_type DROP id');
        $this->addSql('ALTER TABLE defense_type ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE goal_type MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON goal_type');
        $this->addSql('ALTER TABLE goal_type DROP id');
        $this->addSql('ALTER TABLE goal_type ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE pass_types MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON pass_types');
        $this->addSql('ALTER TABLE pass_types DROP id');
        $this->addSql('ALTER TABLE pass_types ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE season MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON season');
        $this->addSql('ALTER TABLE season DROP id');
        $this->addSql('ALTER TABLE season ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE staff_type MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON staff_type');
        $this->addSql('ALTER TABLE staff_type DROP id');
        $this->addSql('ALTER TABLE staff_type ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE user_type MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON user_type');
        $this->addSql('ALTER TABLE user_type DROP id');
        $this->addSql('ALTER TABLE user_type ADD PRIMARY KEY (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE defense_type ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE goal_type ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE pass_types ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE season ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE staff_type ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user_type ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
