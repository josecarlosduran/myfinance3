-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: mfinance_portal
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;
-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: myfinance_portal
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

create database if not exists myfinance_portal;
use myfinance_portal;
--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts`
(
    `id`                varchar(36)                                            NOT NULL,
    `description`       varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `iban`              varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `is_saving_account` tinyint(1)                                             NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses_groups`
--

DROP TABLE IF EXISTS expenses_groups;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses_groups`
(
    `id`          varchar(36)                                             NOT NULL,
    `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `from_date`   date DEFAULT NULL,
    `until_date`  date DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses_groups`
--

LOCK TABLES expenses_groups WRITE;
/*!40000 ALTER TABLE expenses_groups
    DISABLE KEYS */;
/*!40000 ALTER TABLE expenses_groups
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `budgets`
(
    `id`             int                                                   NOT NULL AUTO_INCREMENT,
    `month`          int                                                     DEFAULT NULL,
    `subcategory_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `year`           varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `amount`         double                                                NOT NULL,
    `is_unique`      tinyint(1)                                            NOT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_4CF2F0D6EC83E05` (`month`),
    KEY `IDX_4CF2F0D94E2BEDA` (`subcategory_id`),
    CONSTRAINT `budgets_subcategories_id_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
    CONSTRAINT `FK_4CF2F0D6EC83E05` FOREIGN KEY (`month`) REFERENCES `months` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `budgets`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories`
(
    `id`          varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charge_plans`
--

DROP TABLE IF EXISTS `charge_plans`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `charge_plans`
(
    `id`                 int                                                     NOT NULL AUTO_INCREMENT,
    `description`        varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `initial_day_1`      int                                                     NOT NULL,
    `final_day_1`        int                                                     NOT NULL,
    `charge_day_1`       int                                                     NOT NULL,
    `monthly_increase_1` int                                                     NOT NULL,
    `initial_day_2`      int DEFAULT NULL,
    `final_day_2`        int DEFAULT NULL,
    `charge_day_2`       int DEFAULT NULL,
    `monthly_increase_2` int DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge_plans`
--

LOCK TABLES `charge_plans` WRITE;
/*!40000 ALTER TABLE `charge_plans`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `charge_plans`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domain_events`
--

DROP TABLE IF EXISTS `domain_events`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domain_events`
(
    `id`           varchar(255) DEFAULT NULL,
    `aggregate_id` varchar(255) DEFAULT NULL,
    `name`         varchar(255) DEFAULT NULL,
    `body`         json         DEFAULT NULL,
    `occurred_on`  datetime     DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domain_events`
--

LOCK TABLES `domain_events` WRITE;
/*!40000 ALTER TABLE `domain_events`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `domain_events`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_schemes`
--

DROP TABLE IF EXISTS `import_schemes`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `import_schemes`
(
    `id`                   int                                                     NOT NULL AUTO_INCREMENT,
    `account_id`           varchar(36)                                             DEFAULT NULL,
    `description`          varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `headers_lines_number` int                                                     NOT NULL,
    `data_separator`       varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `decimal_point`        varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `thousand_separator`   varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `data_format`          varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `is_sign_inverted`     tinyint(1)                                              NOT NULL,
    `data1`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data2`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data3`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data4`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data5`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data6`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data7`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data8`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data9`                varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `data10`               varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_5CCC55B29AEFF118` (`account_id`),
    CONSTRAINT `FK_5CCC55B29AEFF118` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_schemes`
--

LOCK TABLES `import_schemes` WRITE;
/*!40000 ALTER TABLE `import_schemes`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `import_schemes`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imports`
--

DROP TABLE IF EXISTS `imports`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imports`
(
    `id`          int                                                     NOT NULL AUTO_INCREMENT,
    `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `rows_number` int DEFAULT NULL,
    `date_import` date                                                    NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQ_DF671367A02A2F00` (`description`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imports`
--

LOCK TABLES `imports` WRITE;
/*!40000 ALTER TABLE `imports`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `imports`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `months`
(
    `id`                int                                                    NOT NULL AUTO_INCREMENT,
    `month_description` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQ_2C492ABD6EC83E05` (`month_description`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `months`
--

LOCK TABLES `months` WRITE;
/*!40000 ALTER TABLE `months`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `months`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movements`
--

DROP TABLE IF EXISTS `movements`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movements`
(
    `id`            varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `subcategory`   varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `version`       int                                                     NOT NULL,
    `account`       varchar(36)                                             NOT NULL,
    `import`        int                                                     DEFAULT NULL,
    `concept`       varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `amount`        double                                                  NOT NULL,
    `bank_balance`  double                                                  DEFAULT NULL,
    `expense_date`  date                                                    NOT NULL,
    `charge_date`   date                                                    NOT NULL,
    `payment_type`  int                                                     DEFAULT NULL,
    `deleted`       tinyint(1)                                              NOT NULL,
    `expense_group` varchar(36)                                             DEFAULT NULL,
    `bank_concept`  varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_593A8C4A632C4314` (`subcategory`),
    KEY `IDX_593A8C4ABF1CD3C3` (`version`),
    KEY `IDX_593A8C4ADEDDF2F0` (`payment_type`),
    KEY `IDX_593A8C4A31C7BFCF` (`account`),
    KEY `IDX_593A8C4AF483A40E` (`import`),
    KEY `IDX_593A8C4A3C02427D` (`expense_group`),
    CONSTRAINT `FK_593A8C4A31C7BFCF` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`),
    CONSTRAINT `FK_593A8C4A3C02427D` FOREIGN KEY (`expense_group`) REFERENCES expenses_groups (`id`),
    CONSTRAINT `FK_593A8C4ABF1CD3C3` FOREIGN KEY (`version`) REFERENCES `versions` (`id`),
    CONSTRAINT `FK_593A8C4ADEDDF2F0` FOREIGN KEY (`payment_type`) REFERENCES `payments_types` (`id`),
    CONSTRAINT `FK_593A8C4AF483A40E` FOREIGN KEY (`import`) REFERENCES `imports` (`id`) ON DELETE CASCADE,
    CONSTRAINT `movements_subcategories_id_fk` FOREIGN KEY (`subcategory`) REFERENCES `subcategories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movements`
--

LOCK TABLES `movements` WRITE;
/*!40000 ALTER TABLE `movements`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `movements`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_types`
--

DROP TABLE IF EXISTS `payments_types`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments_types`
(
    `id`             int                                                     NOT NULL AUTO_INCREMENT,
    `type_id`        int         DEFAULT NULL,
    `account_id`     varchar(36) DEFAULT NULL,
    `charge_plan_id` int         DEFAULT NULL,
    `description`    varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_A91E0C55A9276E6C` (`type_id`),
    KEY `IDX_A91E0C559AEFF118` (`account_id`),
    KEY `IDX_A91E0C554BCD6AF5` (`charge_plan_id`),
    CONSTRAINT `FK_A91E0C554BCD6AF5` FOREIGN KEY (`charge_plan_id`) REFERENCES `charge_plans` (`id`),
    CONSTRAINT `FK_A91E0C559AEFF118` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
    CONSTRAINT `FK_A91E0C55A9276E6C` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_types`
--

LOCK TABLES `payments_types` WRITE;
/*!40000 ALTER TABLE `payments_types`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `payments_types`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategories`
(
    `id`          varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `category_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `account_id`  varchar(36)                                             DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_1B737359F720353` (`category_id`),
    KEY `IDX_1B737359AEFF118` (`account_id`),
    CONSTRAINT `FK_1B737359AEFF118` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `subcategories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types`
(
    `id`          int                                                    NOT NULL AUTO_INCREMENT,
    `description` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `types`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `user`       varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
    `password`   varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `surname`    varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `role`       varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
    `email`      varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `active`     tinyint(1)                                              NOT NULL,
    PRIMARY KEY (`user`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `versions`
--

DROP TABLE IF EXISTS `versions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `versions`
(
    `id`          int                                                    NOT NULL AUTO_INCREMENT,
    `description` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `versions`
--

LOCK TABLES `versions` WRITE;
/*!40000 ALTER TABLE `versions`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `versions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `years`
(
    `id`         int                                                   NOT NULL AUTO_INCREMENT,
    `year`       varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `year_short` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `is_open`    tinyint(1)                                            NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQ_C9C02DE1C3671726` (`year`),
    UNIQUE KEY `UNIQ_C9C02DE1551FA27E` (`year_short`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `years`
--

LOCK TABLES `years` WRITE;
/*!40000 ALTER TABLE `years`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `years`
    ENABLE KEYS */;
UNLOCK TABLES;



/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2020-05-27 10:01:42
