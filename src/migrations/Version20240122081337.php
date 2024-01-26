<?php

declare(strict_types=1);

namespace App\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240122081337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (
            id VARCHAR(255) NOT NULL,
            name TEXT NOT NULL,
            description TEXT NOT NULL,
            rating DOUBLE PRECISION NOT NULL,
            price VARCHAR(255) NOT NULL,
            authors_name TEXT DEFAULT NULL,
            PRIMARY KEY(id))
        ');
        $this->addSql('COMMENT ON COLUMN book.authors_name IS \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE book');
    }
}
