SELECT @@GLOBAL.sql_mode global, @@SESSION.sql_mode session;
SET sql_mode = '';
SET GLOBAL sql_mode = '';


CREATE TABLE rules (
                       id int unsigned NOT NULL AUTO_INCREMENT,
                       name varchar(255) NOT NULL,
                       agency_id int unsigned NOT NULL,
                       text_for_manager text NOT NULL,
                       is_active bool NOT NULL DEFAULT 1,
                       PRIMARY KEY (id),
                       FOREIGN KEY (agency_id) REFERENCES agencies(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE condition_types (
                                 id int unsigned NOT NULL AUTO_INCREMENT,
                                 name varchar(255) NOT NULL,
                                 description varchar(255) DEFAULT NULL,
                                 comparable_value varchar(255) NOT NULL,
                                 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE condition_type_types (
                                      condition_type_id int unsigned NOT NULL,
                                      type_id int unsigned NOT NULL,
                                      PRIMARY KEY (condition_type_id, type_id),
                                      FOREIGN KEY (condition_type_id) REFERENCES condition_types(id),
                                      FOREIGN KEY (type_id) REFERENCES comparison_types(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE comparison_types (
                                  id int unsigned NOT NULL AUTO_INCREMENT,
                                  type varchar(255) NOT NULL,
                                  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

INSERT INTO comparison_types (id, type) VALUES
                                            (1, 'countries.id'),
                                            (2, 'boolean'),
                                            (3, 'integer');

CREATE TABLE operators (
                           id int unsigned NOT NULL AUTO_INCREMENT,
                           name varchar(255) NOT NULL,
                           description varchar(255) DEFAULT NULL,
                           PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE rule_conditions (
                                 id int unsigned NOT NULL AUTO_INCREMENT,
                                 rule_id int unsigned NOT NULL,
                                 condition_type_id int unsigned NOT NULL,
                                 operator_id int unsigned NOT NULL,
                                 value varchar(255) NOT NULL,
                                 PRIMARY KEY (id),
                                 FOREIGN KEY (rule_id) REFERENCES rules(id),
                                 FOREIGN KEY (condition_type_id) REFERENCES condition_types(id),
                                 FOREIGN KEY (operator_id) REFERENCES operators(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

INSERT INTO condition_types (id, name) VALUES
                                           (1, 'country'),
                                           (2, 'city'),
                                           (3, 'tars'),
                                           (4, 'discount_percent'),
                                           (5, 'comission_percent'),
                                           (6, 'is_default'),
                                           (7, 'company_id'),
                                           (8, 'is_black'),
                                           (9, 'is_recomend'),
                                           (10, 'is_white');

INSERT INTO operators (id, name) VALUES
                                     (1, 'eq'),
                                     (2, 'neq'),
                                     (3, 'gt'),
                                     (4, 'lt');
