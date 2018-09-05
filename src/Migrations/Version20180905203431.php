<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180905203431 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE elements (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE psychotest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, psychotest_id INT NOT NULL, question VARCHAR(255) NOT NULL, INDEX IDX_B6F7494E34AAF08B (psychotest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE response (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, response VARCHAR(255) NOT NULL, INDEX IDX_3E7B0BFB1E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, response_id INT NOT NULL, element_id INT NOT NULL, points INT NOT NULL, INDEX IDX_32993751FBF32840 (response_id), INDEX IDX_329937511F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E34AAF08B FOREIGN KEY (psychotest_id) REFERENCES psychotest (id)');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFB1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751FBF32840 FOREIGN KEY (response_id) REFERENCES response (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937511F1F2A24 FOREIGN KEY (element_id) REFERENCES elements (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937511F1F2A24');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E34AAF08B');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFB1E27F6BF');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751FBF32840');
        $this->addSql('DROP TABLE elements');
        $this->addSql('DROP TABLE psychotest');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE response');
        $this->addSql('DROP TABLE score');
    }
}
