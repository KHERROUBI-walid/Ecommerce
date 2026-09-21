<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260920112542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_panier_option (ligne_panier_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_E41CE3CF38989DF4 (ligne_panier_id), INDEX IDX_E41CE3CFA7C41D6F (option_id), PRIMARY KEY (ligne_panier_id, option_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE ligne_panier_option ADD CONSTRAINT FK_E41CE3CF38989DF4 FOREIGN KEY (ligne_panier_id) REFERENCES ligne_panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_panier_option ADD CONSTRAINT FK_E41CE3CFA7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_panier_option DROP FOREIGN KEY FK_E41CE3CF38989DF4');
        $this->addSql('ALTER TABLE ligne_panier_option DROP FOREIGN KEY FK_E41CE3CFA7C41D6F');
        $this->addSql('DROP TABLE ligne_panier_option');
    }
}
