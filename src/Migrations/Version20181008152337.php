<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181008152337 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(2) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5373C9665E237E06 (name), UNIQUE INDEX UNIQ_5373C96677153098 (code), UNIQUE INDEX UNIQ_5373C966989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, members_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(2) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D4DB71B55E237E06 (name), UNIQUE INDEX UNIQ_D4DB71B577153098 (code), UNIQUE INDEX UNIQ_D4DB71B5989D9B62 (slug), INDEX IDX_D4DB71B5BD01F5ED (members_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE language ADD CONSTRAINT FK_D4DB71B5BD01F5ED FOREIGN KEY (members_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE member ADD country_id INT DEFAULT NULL, ADD hobbies LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70E4FA78F92F3E70 ON member (country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78F92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP INDEX UNIQ_70E4FA78F92F3E70 ON member');
        $this->addSql('ALTER TABLE member DROP country_id, DROP hobbies');
    }
}
