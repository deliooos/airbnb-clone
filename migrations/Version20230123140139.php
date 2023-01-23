<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230123140139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE housing ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FB8142C3C54C8C93 ON housing (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE housing DROP CONSTRAINT FK_FB8142C3C54C8C93');
        $this->addSql('DROP SEQUENCE type_id_seq CASCADE');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP INDEX IDX_FB8142C3C54C8C93');
        $this->addSql('ALTER TABLE housing DROP type_id');
    }
}
