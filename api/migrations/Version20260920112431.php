<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260920112431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_commande_option (ligne_commande_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_53339A76E10FEE63 (ligne_commande_id), INDEX IDX_53339A76A7C41D6F (option_id), PRIMARY KEY (ligne_commande_id, option_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE ligne_commande_option ADD CONSTRAINT FK_53339A76E10FEE63 FOREIGN KEY (ligne_commande_id) REFERENCES ligne_commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande_option ADD CONSTRAINT FK_53339A76A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande ADD formule_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B2A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)');
        $this->addSql('CREATE INDEX IDX_3170B74B2A68F4D1 ON ligne_commande (formule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_commande_option DROP FOREIGN KEY FK_53339A76E10FEE63');
        $this->addSql('ALTER TABLE ligne_commande_option DROP FOREIGN KEY FK_53339A76A7C41D6F');
        $this->addSql('DROP TABLE ligne_commande_option');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B2A68F4D1');
        $this->addSql('DROP INDEX IDX_3170B74B2A68F4D1 ON ligne_commande');
        $this->addSql('ALTER TABLE ligne_commande DROP formule_id');
    }
}
