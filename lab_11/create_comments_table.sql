CREATE TABLE IF NOT EXISTS `comments` (
    `id`         INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    `article_id` INT UNSIGNED    NOT NULL,
    `author_id`  INT UNSIGNED    NOT NULL,
    `text`       TEXT            NOT NULL,
    `created_at` DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
