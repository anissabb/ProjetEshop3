<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324202508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, notes NUMERIC(2, 1) NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, numero_commande INT NOT NULL, mode_paiement VARCHAR(255) NOT NULL, date_commande DATE NOT NULL, mode_livraison VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_detail_commande (commande_id INT NOT NULL, detail_commande_id INT NOT NULL, INDEX IDX_FEF72F6382EA2E54 (commande_id), INDEX IDX_FEF72F63EDE14305 (detail_commande_id), PRIMARY KEY(commande_id, detail_commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_commande (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, avis_id INT DEFAULT NULL, nom_produit VARCHAR(255) NOT NULL, prix_produit NUMERIC(5, 2) NOT NULL, quantite INT NOT NULL, INDEX IDX_29A5EC27197E709F (avis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_detail_commande (produit_id INT NOT NULL, detail_commande_id INT NOT NULL, INDEX IDX_B83A8FB4F347EFB (produit_id), INDEX IDX_B83A8FB4EDE14305 (detail_commande_id), PRIMARY KEY(produit_id, detail_commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_detail_commande ADD CONSTRAINT FK_FEF72F6382EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_detail_commande ADD CONSTRAINT FK_FEF72F63EDE14305 FOREIGN KEY (detail_commande_id) REFERENCES detail_commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27197E709F FOREIGN KEY (avis_id) REFERENCES avis (id)');
        $this->addSql('ALTER TABLE produit_detail_commande ADD CONSTRAINT FK_B83A8FB4F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_detail_commande ADD CONSTRAINT FK_B83A8FB4EDE14305 FOREIGN KEY (detail_commande_id) REFERENCES detail_commande (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_detail_commande DROP FOREIGN KEY FK_FEF72F6382EA2E54');
        $this->addSql('ALTER TABLE commande_detail_commande DROP FOREIGN KEY FK_FEF72F63EDE14305');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27197E709F');
        $this->addSql('ALTER TABLE produit_detail_commande DROP FOREIGN KEY FK_B83A8FB4F347EFB');
        $this->addSql('ALTER TABLE produit_detail_commande DROP FOREIGN KEY FK_B83A8FB4EDE14305');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_detail_commande');
        $this->addSql('DROP TABLE detail_commande');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_detail_commande');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
