<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414225155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `addresses` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, company_id INT DEFAULT NULL, city_id INT NOT NULL, number INT NOT NULL, street VARCHAR(255) NOT NULL, INDEX IDX_6FCA7516A76ED395 (user_id), INDEX IDX_6FCA7516979B1AD6 (company_id), INDEX IDX_6FCA75168BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `admins` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `advert_categories` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, category VARCHAR(150) NOT NULL, INDEX IDX_33DF3752F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `advert_types` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_5114945CF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `adverts` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, type_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_8C88E777F675F31B (author_id), INDEX IDX_8C88E777C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `cities` (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, author_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, zipcode INT NOT NULL, INDEX IDX_D95DB16BF92F3E70 (country_id), INDEX IDX_D95DB16BF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `comments` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, comment LONGTEXT NOT NULL, INDEX IDX_5F9E962AF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `companies` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, siret VARCHAR(255) NOT NULL, INDEX IDX_8244AA3AF675F31B (author_id), INDEX IDX_8244AA3A12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `company_categories` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_877DAFFEF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `contacts` (id INT AUTO_INCREMENT NOT NULL, support_by_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_33401573585D36DC (support_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `countries` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, indicative VARCHAR(10) NOT NULL, flag_filename VARCHAR(255) DEFAULT NULL, INDEX IDX_5D66EBADF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `document_types` (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `documents` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, type_id INT DEFAULT NULL, validator_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A2B07288A76ED395 (user_id), INDEX IDX_A2B07288C54C8C93 (type_id), INDEX IDX_A2B07288B0644AEC (validator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `event_categories` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_621D9F47F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `events` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, address_id INT DEFAULT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, nb_of_like INT NOT NULL, nb_of_deslike INT NOT NULL, nb_place INT NOT NULL, INDEX IDX_5387574AF675F31B (author_id), INDEX IDX_5387574AF5B7AF75 (address_id), INDEX IDX_5387574A12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `faqs` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, question LONGTEXT NOT NULL, answer LONGTEXT NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_8934BEE5F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `images` (id INT AUTO_INCREMENT NOT NULL, filename VARCHAR(255) NOT NULL, mime VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `messages` (id INT AUTO_INCREMENT NOT NULL, sender_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_DB021E96F624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `notification_types` (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, INDEX IDX_9F846CC9F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `notifications` (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_6000B0D3C54C8C93 (type_id), INDEX IDX_6000B0D3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `signals` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, status INT NOT NULL, reason VARCHAR(255) NOT NULL, INDEX IDX_D6ADC50DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `taxonomies` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `users` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `addresses` ADD CONSTRAINT FK_6FCA7516A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `addresses` ADD CONSTRAINT FK_6FCA7516979B1AD6 FOREIGN KEY (company_id) REFERENCES `companies` (id)');
        $this->addSql('ALTER TABLE `addresses` ADD CONSTRAINT FK_6FCA75168BAC62AF FOREIGN KEY (city_id) REFERENCES `cities` (id)');
        $this->addSql('ALTER TABLE `advert_categories` ADD CONSTRAINT FK_33DF3752F675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `advert_types` ADD CONSTRAINT FK_5114945CF675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `adverts` ADD CONSTRAINT FK_8C88E777F675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `adverts` ADD CONSTRAINT FK_8C88E777C54C8C93 FOREIGN KEY (type_id) REFERENCES `advert_types` (id)');
        $this->addSql('ALTER TABLE `cities` ADD CONSTRAINT FK_D95DB16BF92F3E70 FOREIGN KEY (country_id) REFERENCES `countries` (id)');
        $this->addSql('ALTER TABLE `cities` ADD CONSTRAINT FK_D95DB16BF675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `comments` ADD CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `companies` ADD CONSTRAINT FK_8244AA3AF675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `companies` ADD CONSTRAINT FK_8244AA3A12469DE2 FOREIGN KEY (category_id) REFERENCES `company_categories` (id)');
        $this->addSql('ALTER TABLE `company_categories` ADD CONSTRAINT FK_877DAFFEF675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `contacts` ADD CONSTRAINT FK_33401573585D36DC FOREIGN KEY (support_by_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `countries` ADD CONSTRAINT FK_5D66EBADF675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `documents` ADD CONSTRAINT FK_A2B07288A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `documents` ADD CONSTRAINT FK_A2B07288C54C8C93 FOREIGN KEY (type_id) REFERENCES `document_types` (id)');
        $this->addSql('ALTER TABLE `documents` ADD CONSTRAINT FK_A2B07288B0644AEC FOREIGN KEY (validator_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `event_categories` ADD CONSTRAINT FK_621D9F47F675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `events` ADD CONSTRAINT FK_5387574AF675F31B FOREIGN KEY (author_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `events` ADD CONSTRAINT FK_5387574AF5B7AF75 FOREIGN KEY (address_id) REFERENCES `addresses` (id)');
        $this->addSql('ALTER TABLE `events` ADD CONSTRAINT FK_5387574A12469DE2 FOREIGN KEY (category_id) REFERENCES `event_categories` (id)');
        $this->addSql('ALTER TABLE `faqs` ADD CONSTRAINT FK_8934BEE5F675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `messages` ADD CONSTRAINT FK_DB021E96F624B39D FOREIGN KEY (sender_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `notification_types` ADD CONSTRAINT FK_9F846CC9F675F31B FOREIGN KEY (author_id) REFERENCES `admins` (id)');
        $this->addSql('ALTER TABLE `notifications` ADD CONSTRAINT FK_6000B0D3C54C8C93 FOREIGN KEY (type_id) REFERENCES `notification_types` (id)');
        $this->addSql('ALTER TABLE `notifications` ADD CONSTRAINT FK_6000B0D3A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `signals` ADD CONSTRAINT FK_D6ADC50DA76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `events` DROP FOREIGN KEY FK_5387574AF5B7AF75');
        $this->addSql('ALTER TABLE `advert_categories` DROP FOREIGN KEY FK_33DF3752F675F31B');
        $this->addSql('ALTER TABLE `advert_types` DROP FOREIGN KEY FK_5114945CF675F31B');
        $this->addSql('ALTER TABLE `adverts` DROP FOREIGN KEY FK_8C88E777F675F31B');
        $this->addSql('ALTER TABLE `cities` DROP FOREIGN KEY FK_D95DB16BF675F31B');
        $this->addSql('ALTER TABLE `companies` DROP FOREIGN KEY FK_8244AA3AF675F31B');
        $this->addSql('ALTER TABLE `company_categories` DROP FOREIGN KEY FK_877DAFFEF675F31B');
        $this->addSql('ALTER TABLE `contacts` DROP FOREIGN KEY FK_33401573585D36DC');
        $this->addSql('ALTER TABLE `countries` DROP FOREIGN KEY FK_5D66EBADF675F31B');
        $this->addSql('ALTER TABLE `documents` DROP FOREIGN KEY FK_A2B07288B0644AEC');
        $this->addSql('ALTER TABLE `event_categories` DROP FOREIGN KEY FK_621D9F47F675F31B');
        $this->addSql('ALTER TABLE `faqs` DROP FOREIGN KEY FK_8934BEE5F675F31B');
        $this->addSql('ALTER TABLE `notification_types` DROP FOREIGN KEY FK_9F846CC9F675F31B');
        $this->addSql('ALTER TABLE `adverts` DROP FOREIGN KEY FK_8C88E777C54C8C93');
        $this->addSql('ALTER TABLE `addresses` DROP FOREIGN KEY FK_6FCA75168BAC62AF');
        $this->addSql('ALTER TABLE `addresses` DROP FOREIGN KEY FK_6FCA7516979B1AD6');
        $this->addSql('ALTER TABLE `companies` DROP FOREIGN KEY FK_8244AA3A12469DE2');
        $this->addSql('ALTER TABLE `cities` DROP FOREIGN KEY FK_D95DB16BF92F3E70');
        $this->addSql('ALTER TABLE `documents` DROP FOREIGN KEY FK_A2B07288C54C8C93');
        $this->addSql('ALTER TABLE `events` DROP FOREIGN KEY FK_5387574A12469DE2');
        $this->addSql('ALTER TABLE `notifications` DROP FOREIGN KEY FK_6000B0D3C54C8C93');
        $this->addSql('ALTER TABLE `addresses` DROP FOREIGN KEY FK_6FCA7516A76ED395');
        $this->addSql('ALTER TABLE `comments` DROP FOREIGN KEY FK_5F9E962AF675F31B');
        $this->addSql('ALTER TABLE `documents` DROP FOREIGN KEY FK_A2B07288A76ED395');
        $this->addSql('ALTER TABLE `events` DROP FOREIGN KEY FK_5387574AF675F31B');
        $this->addSql('ALTER TABLE `messages` DROP FOREIGN KEY FK_DB021E96F624B39D');
        $this->addSql('ALTER TABLE `notifications` DROP FOREIGN KEY FK_6000B0D3A76ED395');
        $this->addSql('ALTER TABLE `signals` DROP FOREIGN KEY FK_D6ADC50DA76ED395');
        $this->addSql('DROP TABLE `addresses`');
        $this->addSql('DROP TABLE `admins`');
        $this->addSql('DROP TABLE `advert_categories`');
        $this->addSql('DROP TABLE `advert_types`');
        $this->addSql('DROP TABLE `adverts`');
        $this->addSql('DROP TABLE `cities`');
        $this->addSql('DROP TABLE `comments`');
        $this->addSql('DROP TABLE `companies`');
        $this->addSql('DROP TABLE `company_categories`');
        $this->addSql('DROP TABLE `contacts`');
        $this->addSql('DROP TABLE `countries`');
        $this->addSql('DROP TABLE `document_types`');
        $this->addSql('DROP TABLE `documents`');
        $this->addSql('DROP TABLE `event_categories`');
        $this->addSql('DROP TABLE `events`');
        $this->addSql('DROP TABLE `faqs`');
        $this->addSql('DROP TABLE `images`');
        $this->addSql('DROP TABLE `messages`');
        $this->addSql('DROP TABLE `notification_types`');
        $this->addSql('DROP TABLE `notifications`');
        $this->addSql('DROP TABLE `signals`');
        $this->addSql('DROP TABLE `taxonomies`');
        $this->addSql('DROP TABLE `users`');
    }
}
