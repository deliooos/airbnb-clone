<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230123140002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE equipment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE housing_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE equipment (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE equipment_housing (equipment_id INT NOT NULL, housing_id INT NOT NULL, PRIMARY KEY(equipment_id, housing_id))');
        $this->addSql('CREATE INDEX IDX_8DFA8D2C517FE9FE ON equipment_housing (equipment_id)');
        $this->addSql('CREATE INDEX IDX_8DFA8D2CAD5873E3 ON equipment_housing (housing_id)');
        $this->addSql('CREATE TABLE housing (id INT NOT NULL, author_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, size DOUBLE PRECISION NOT NULL, description TEXT NOT NULL, bed INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FB8142C3F675F31B ON housing (author_id)');
        $this->addSql('ALTER TABLE equipment_housing ADD CONSTRAINT FK_8DFA8D2C517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE equipment_housing ADD CONSTRAINT FK_8DFA8D2CAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C3F675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE equipment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE housing_id_seq CASCADE');
        $this->addSql('ALTER TABLE equipment_housing DROP CONSTRAINT FK_8DFA8D2C517FE9FE');
        $this->addSql('ALTER TABLE equipment_housing DROP CONSTRAINT FK_8DFA8D2CAD5873E3');
        $this->addSql('ALTER TABLE housing DROP CONSTRAINT FK_FB8142C3F675F31B');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_housing');
        $this->addSql('DROP TABLE housing');
    }
}
