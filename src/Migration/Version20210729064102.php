<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729064102 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bet (id INT NOT NULL, holder_id INT NOT NULL, auction_id INT NOT NULL, status_id INT NOT NULL, value INT NOT NULL, play_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FBF0EC9BDEEE62D0 ON bet (holder_id)');
        $this->addSql('CREATE INDEX IDX_FBF0EC9B57B8F0DE ON bet (auction_id)');
        $this->addSql('CREATE INDEX IDX_FBF0EC9B6BF700BD ON bet (status_id)');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BDEEE62D0 FOREIGN KEY (holder_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B57B8F0DE FOREIGN KEY (auction_id) REFERENCES auction (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B6BF700BD FOREIGN KEY (status_id) REFERENCES bet_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE bet_id_seq CASCADE');
        $this->addSql('DROP TABLE bet');
    }
}
