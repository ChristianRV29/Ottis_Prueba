<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200301213512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE actividad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE proyecto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE actividad (id INT NOT NULL, nombre VARCHAR(50) NOT NULL, descripcion VARCHAR(200) NOT NULL, id_proyecto INT NOT NULL, id_usuario INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE usuario (id INT NOT NULL, nombre VARCHAR(50) NOT NULL, apellido VARCHAR(50) NOT NULL, sexo VARCHAR(1) NOT NULL, correo VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, rol INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE proyecto (id INT NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(200) NOT NULL, fecha_inicio DATE NOT NULL, fecha_finalizacion DATE DEFAULT NULL, top BOOLEAN NOT NULL, imagen VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE actividad_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuario_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE proyecto_id_seq CASCADE');
        $this->addSql('DROP TABLE actividad');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE proyecto');
    }
}
