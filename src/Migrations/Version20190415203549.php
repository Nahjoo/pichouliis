<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415203549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE legume (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, variete VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legume_planche (legume_id INT NOT NULL, planche_id INT NOT NULL, INDEX IDX_3F831F3F25F18E37 (legume_id), INDEX IDX_3F831F3FDA8652A8 (planche_id), PRIMARY KEY(legume_id, planche_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legume_tache (legume_id INT NOT NULL, tache_id INT NOT NULL, INDEX IDX_C41CFF6D25F18E37 (legume_id), INDEX IDX_C41CFF6DD2235D39 (tache_id), PRIMARY KEY(legume_id, tache_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planche (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, subarea_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_ABF41FB89F2C3FAB (zone_id), INDEX IDX_ABF41FB8F66DE853 (subarea_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rotation (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, subarea_id INT DEFAULT NULL, planche_id INT DEFAULT NULL, legume_id INT DEFAULT NULL, variete_id INT DEFAULT NULL, tache_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, date INT NOT NULL, amount INT NOT NULL, time VARCHAR(255) NOT NULL, choice VARCHAR(255) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_297C98F19F2C3FAB (zone_id), INDEX IDX_297C98F1F66DE853 (subarea_id), INDEX IDX_297C98F1DA8652A8 (planche_id), INDEX IDX_297C98F125F18E37 (legume_id), INDEX IDX_297C98F1620D5460 (variete_id), INDEX IDX_297C98F1D2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subarea (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E214FE39F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache_planche (tache_id INT NOT NULL, planche_id INT NOT NULL, INDEX IDX_61A2210DD2235D39 (tache_id), INDEX IDX_61A2210DDA8652A8 (planche_id), PRIMARY KEY(tache_id, planche_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variete (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE legume_planche ADD CONSTRAINT FK_3F831F3F25F18E37 FOREIGN KEY (legume_id) REFERENCES legume (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE legume_planche ADD CONSTRAINT FK_3F831F3FDA8652A8 FOREIGN KEY (planche_id) REFERENCES planche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE legume_tache ADD CONSTRAINT FK_C41CFF6D25F18E37 FOREIGN KEY (legume_id) REFERENCES legume (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE legume_tache ADD CONSTRAINT FK_C41CFF6DD2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planche ADD CONSTRAINT FK_ABF41FB89F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE planche ADD CONSTRAINT FK_ABF41FB8F66DE853 FOREIGN KEY (subarea_id) REFERENCES subarea (id)');
        $this->addSql('ALTER TABLE rotation ADD CONSTRAINT FK_297C98F19F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE rotation ADD CONSTRAINT FK_297C98F1F66DE853 FOREIGN KEY (subarea_id) REFERENCES subarea (id)');
        $this->addSql('ALTER TABLE rotation ADD CONSTRAINT FK_297C98F1DA8652A8 FOREIGN KEY (planche_id) REFERENCES planche (id)');
        $this->addSql('ALTER TABLE rotation ADD CONSTRAINT FK_297C98F125F18E37 FOREIGN KEY (legume_id) REFERENCES legume (id)');
        $this->addSql('ALTER TABLE rotation ADD CONSTRAINT FK_297C98F1620D5460 FOREIGN KEY (variete_id) REFERENCES variete (id)');
        $this->addSql('ALTER TABLE rotation ADD CONSTRAINT FK_297C98F1D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE subarea ADD CONSTRAINT FK_E214FE39F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE tache_planche ADD CONSTRAINT FK_61A2210DD2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tache_planche ADD CONSTRAINT FK_61A2210DDA8652A8 FOREIGN KEY (planche_id) REFERENCES planche (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE legume_planche DROP FOREIGN KEY FK_3F831F3F25F18E37');
        $this->addSql('ALTER TABLE legume_tache DROP FOREIGN KEY FK_C41CFF6D25F18E37');
        $this->addSql('ALTER TABLE rotation DROP FOREIGN KEY FK_297C98F125F18E37');
        $this->addSql('ALTER TABLE legume_planche DROP FOREIGN KEY FK_3F831F3FDA8652A8');
        $this->addSql('ALTER TABLE rotation DROP FOREIGN KEY FK_297C98F1DA8652A8');
        $this->addSql('ALTER TABLE tache_planche DROP FOREIGN KEY FK_61A2210DDA8652A8');
        $this->addSql('ALTER TABLE planche DROP FOREIGN KEY FK_ABF41FB8F66DE853');
        $this->addSql('ALTER TABLE rotation DROP FOREIGN KEY FK_297C98F1F66DE853');
        $this->addSql('ALTER TABLE legume_tache DROP FOREIGN KEY FK_C41CFF6DD2235D39');
        $this->addSql('ALTER TABLE rotation DROP FOREIGN KEY FK_297C98F1D2235D39');
        $this->addSql('ALTER TABLE tache_planche DROP FOREIGN KEY FK_61A2210DD2235D39');
        $this->addSql('ALTER TABLE rotation DROP FOREIGN KEY FK_297C98F1620D5460');
        $this->addSql('ALTER TABLE planche DROP FOREIGN KEY FK_ABF41FB89F2C3FAB');
        $this->addSql('ALTER TABLE rotation DROP FOREIGN KEY FK_297C98F19F2C3FAB');
        $this->addSql('ALTER TABLE subarea DROP FOREIGN KEY FK_E214FE39F2C3FAB');
        $this->addSql('DROP TABLE legume');
        $this->addSql('DROP TABLE legume_planche');
        $this->addSql('DROP TABLE legume_tache');
        $this->addSql('DROP TABLE planche');
        $this->addSql('DROP TABLE rotation');
        $this->addSql('DROP TABLE subarea');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE tache_planche');
        $this->addSql('DROP TABLE variete');
        $this->addSql('DROP TABLE zone');
    }
}
