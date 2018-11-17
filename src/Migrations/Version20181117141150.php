<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117141150 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE game_session (id INT AUTO_INCREMENT NOT NULL, add_date DATETIME NOT NULL, session_date DATETIME NOT NULL, max_date_inscription DATETIME NOT NULL, session_rate DOUBLE PRECISION NOT NULL, max_places INT NOT NULL, session_duration INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internet_speed (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE member ADD internet_speed_id INT DEFAULT NULL, ADD session_id INT DEFAULT NULL, ADD birthdate DATE NOT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78C438BCD5 FOREIGN KEY (internet_speed_id) REFERENCES internet_speed (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78613FECDF FOREIGN KEY (session_id) REFERENCES game_session (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70E4FA78C438BCD5 ON member (internet_speed_id)');
        $this->addSql('CREATE INDEX IDX_70E4FA78613FECDF ON member (session_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78613FECDF');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78C438BCD5');
        $this->addSql('DROP TABLE game_session');
        $this->addSql('DROP TABLE internet_speed');
        $this->addSql('ALTER TABLE game DROP description');
        $this->addSql('DROP INDEX UNIQ_70E4FA78C438BCD5 ON member');
        $this->addSql('DROP INDEX IDX_70E4FA78613FECDF ON member');
        $this->addSql('ALTER TABLE member DROP internet_speed_id, DROP session_id, DROP birthdate');
    }
}
