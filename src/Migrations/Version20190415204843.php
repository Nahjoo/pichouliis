<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415204843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE variete ADD legume_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variete ADD CONSTRAINT FK_2CD7CD5825F18E37 FOREIGN KEY (legume_id) REFERENCES legume (id)');
        $this->addSql('CREATE INDEX IDX_2CD7CD5825F18E37 ON variete (legume_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE variete DROP FOREIGN KEY FK_2CD7CD5825F18E37');
        $this->addSql('DROP INDEX IDX_2CD7CD5825F18E37 ON variete');
        $this->addSql('ALTER TABLE variete DROP legume_id');
    }
}
