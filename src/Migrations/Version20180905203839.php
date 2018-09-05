<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180905203839 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937511F1F2A24');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE elements');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937511F1F2A24');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937511F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937511F1F2A24');
        $this->addSql('CREATE TABLE elements (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE element');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937511F1F2A24');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937511F1F2A24 FOREIGN KEY (element_id) REFERENCES elements (id)');
    }
}
