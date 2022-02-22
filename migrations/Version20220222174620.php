<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222174620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__articulo AS SELECT id, titulo, fecha, texto, comentario, resumen, categoria, url, medio FROM articulo');
        $this->addSql('DROP TABLE articulo');
        $this->addSql('CREATE TABLE articulo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titulo VARCHAR(50) NOT NULL COLLATE BINARY, fecha DATE NOT NULL, texto CLOB NOT NULL COLLATE BINARY, comentario CLOB DEFAULT NULL COLLATE BINARY, resumen CLOB DEFAULT NULL COLLATE BINARY, categoria VARCHAR(50) NOT NULL COLLATE BINARY, url VARCHAR(255) DEFAULT NULL, medio VARCHAR(50) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO articulo (id, titulo, fecha, texto, comentario, resumen, categoria, url, medio) SELECT id, titulo, fecha, texto, comentario, resumen, categoria, url, medio FROM __temp__articulo');
        $this->addSql('DROP TABLE __temp__articulo');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__articulo AS SELECT id, titulo, fecha, texto, comentario, resumen, categoria, url, medio FROM articulo');
        $this->addSql('DROP TABLE articulo');
        $this->addSql('CREATE TABLE articulo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titulo VARCHAR(50) NOT NULL, fecha DATE NOT NULL, texto CLOB NOT NULL, comentario CLOB DEFAULT NULL, resumen CLOB DEFAULT NULL, categoria VARCHAR(50) NOT NULL, url VARCHAR(50) DEFAULT NULL COLLATE BINARY, medio VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO articulo (id, titulo, fecha, texto, comentario, resumen, categoria, url, medio) SELECT id, titulo, fecha, texto, comentario, resumen, categoria, url, medio FROM __temp__articulo');
        $this->addSql('DROP TABLE __temp__articulo');
    }
}
