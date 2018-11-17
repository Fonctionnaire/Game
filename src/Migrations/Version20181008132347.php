<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181008132347 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, date_envoie DATETIME NOT NULL, pseudo VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, email VARCHAR(60) NOT NULL, accept_terms TINYINT(1) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, types_id INT DEFAULT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_232B318C5E237E06 (name), UNIQUE INDEX UNIQ_232B318C989D9B62 (slug), INDEX IDX_232B318C8EB23357 (types_id), UNIQUE INDEX UNIQ_232B318C3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_image (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_67CB3B055E237E06 (name), UNIQUE INDEX UNIQ_67CB3B05989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, games_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3952D0CB5E237E06 (name), UNIQUE INDEX UNIQ_3952D0CB989D9B62 (slug), INDEX IDX_3952D0CB97FFC673 (games_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(60) NOT NULL, roles JSON NOT NULL, is_active TINYINT(1) NOT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, change_password_token VARCHAR(255) DEFAULT NULL, change_password_token_validity DATETIME DEFAULT NULL, email_confirmed TINYINT(1) NOT NULL, date_register DATETIME NOT NULL, accept_terms TINYINT(1) NOT NULL, user_ip VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_70E4FA78F85E0677 (username), UNIQUE INDEX UNIQ_70E4FA78E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C8EB23357 FOREIGN KEY (types_id) REFERENCES game_type (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C3DA5256D FOREIGN KEY (image_id) REFERENCES game_image (id)');
        $this->addSql('ALTER TABLE platform ADD CONSTRAINT FK_3952D0CB97FFC673 FOREIGN KEY (games_id) REFERENCES game (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE platform DROP FOREIGN KEY FK_3952D0CB97FFC673');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C3DA5256D');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C8EB23357');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_image');
        $this->addSql('DROP TABLE game_type');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE member');
    }
}
