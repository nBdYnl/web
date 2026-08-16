-- ============================================================
-- nBdy Database Schema
-- ============================================================
-- Run this first to create the database and tables
-- ============================================================

CREATE DATABASE IF NOT EXISTS nbdy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nbdy;

-- ============================================================
-- USERS
-- ============================================================
CREATE TABLE IF NOT EXISTS users (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    email           VARCHAR(255) NOT NULL UNIQUE,
    password_hash   VARCHAR(255) NOT NULL,
    display_name    VARCHAR(100) NOT NULL,
    avatar_init     CHAR(1) DEFAULT NULL,
    role            ENUM('member','moderator','admin') DEFAULT 'member',
    bio             TEXT DEFAULT NULL,
    joined_at       DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_active     DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_active       TINYINT(1) DEFAULT 1,
    lang_preference ENUM('nl','en','de') DEFAULT 'nl',
    theme_preference ENUM('light','dark','auto') DEFAULT 'auto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- CATEGORIES (for stories, forum, etc.)
-- ============================================================
CREATE TABLE IF NOT EXISTS categories (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    slug        VARCHAR(50) NOT NULL UNIQUE,
    name_nl     VARCHAR(100) NOT NULL,
    name_en     VARCHAR(100) NOT NULL,
    name_de     VARCHAR(100) NOT NULL,
    color       VARCHAR(7) DEFAULT '#A67C3D',
    sort_order  INT DEFAULT 0,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- STORIES / ARTICLES
-- ============================================================
CREATE TABLE IF NOT EXISTS stories (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    slug            VARCHAR(200) NOT NULL UNIQUE,
    title           VARCHAR(255) NOT NULL,
    excerpt         TEXT,
    content         LONGTEXT,
    featured_image  VARCHAR(500) DEFAULT NULL,
    category_id     INT DEFAULT NULL,
    author_id       INT DEFAULT NULL,
    status          ENUM('draft','published','archived') DEFAULT 'draft',
    is_featured     TINYINT(1) DEFAULT 0,
    read_time       VARCHAR(20) DEFAULT NULL,
    published_at    DATETIME DEFAULT NULL,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    view_count      INT DEFAULT 0,
    meta_nl         JSON DEFAULT NULL,
    meta_en         JSON DEFAULT NULL,
    meta_de         JSON DEFAULT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_status_published (status, published_at),
    INDEX idx_featured (is_featured, published_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- FORUM TOPICS
-- ============================================================
CREATE TABLE IF NOT EXISTS forum_topics (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    slug            VARCHAR(200) NOT NULL UNIQUE,
    title           VARCHAR(255) NOT NULL,
    content         TEXT NOT NULL,
    category_id     INT DEFAULT NULL,
    author_id       INT DEFAULT NULL,
    status          ENUM('open','closed','pinned') DEFAULT 'open',
    reply_count     INT DEFAULT 0,
    view_count      INT DEFAULT 0,
    last_reply_at   DATETIME DEFAULT NULL,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_status_created (status, created_at),
    INDEX idx_last_reply (last_reply_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- FORUM REPLIES
-- ============================================================
CREATE TABLE IF NOT EXISTS forum_replies (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    topic_id    INT NOT NULL,
    author_id   INT DEFAULT NULL,
    content     TEXT NOT NULL,
    parent_id   INT DEFAULT NULL,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES forum_topics(id) ON DELETE CASCADE,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (parent_id) REFERENCES forum_replies(id) ON DELETE CASCADE,
    INDEX idx_topic_created (topic_id, created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TESTIMONIALS
-- ============================================================
CREATE TABLE IF NOT EXISTS testimonials (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    quote_nl    TEXT NOT NULL,
    quote_en    TEXT NOT NULL,
    quote_de    TEXT NOT NULL,
    author_name VARCHAR(100) NOT NULL,
    author_role VARCHAR(100) NOT NULL,
    author_init CHAR(1) DEFAULT NULL,
    sort_order  INT DEFAULT 0,
    is_active   TINYINT(1) DEFAULT 1,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- EXERCISES
-- ============================================================
CREATE TABLE IF NOT EXISTS exercises (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    slug            VARCHAR(100) NOT NULL UNIQUE,
    label_nl        VARCHAR(100),
    label_en        VARCHAR(100),
    label_de        VARCHAR(100),
    quote_nl        TEXT,
    quote_en        TEXT,
    quote_de        TEXT,
    description_nl  TEXT,
    description_en  TEXT,
    description_de  TEXT,
    cta_nl          VARCHAR(200),
    cta_en          VARCHAR(200),
    cta_de          VARCHAR(200),
    week_start      DATE DEFAULT NULL,
    is_active       TINYINT(1) DEFAULT 1,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- SITE SETTINGS
-- ============================================================
CREATE TABLE IF NOT EXISTS site_settings (
    setting_key     VARCHAR(100) PRIMARY KEY,
    setting_value   TEXT,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- ACTIVITY LOG (for moderation)
-- ============================================================
CREATE TABLE IF NOT EXISTS activity_log (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT DEFAULT NULL,
    action      VARCHAR(100) NOT NULL,
    entity_type ENUM('story','forum_topic','forum_reply','user') DEFAULT NULL,
    entity_id   INT DEFAULT NULL,
    ip_address  VARCHAR(45) DEFAULT NULL,
    user_agent  VARCHAR(255) DEFAULT NULL,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_created (user_id, created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
