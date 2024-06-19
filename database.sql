CREATE TABLE IF NOT EXISTS users(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    user_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE KEY(email)
);

CREATE TABLE IF NOT EXISTS expense_category_default(
     id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
     name varchar(255) NOT NULL,
     PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS expense_category_assigned_to_users(
     id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
     user_id bigint(20) unsigned NOT NULL,
     name varchar(255) NOT NULL,
     limits decimal(10,2),
     PRIMARY KEY(id),
     FOREIGN KEY (user_id) REFERENCES users (id)  
);


CREATE TABLE IF NOT EXISTS expenses(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id bigint(20) unsigned NOT NULL,
    expense_category_assigned_to_user_id bigint(20) unsigned NOT NULL,
    amount decimal(10,2) NOT NULL,
    date_of_expense datetime NOT NULL,
    expense_comment varchar(255),
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users (id)
    -- FOREIGN KEY (expense_category_assigned_to_user_id) REFERENCES expense_category_assigned_to_users (id)  
);

CREATE TABLE IF NOT EXISTS income_category_default(
     id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
     name varchar(255) NOT NULL,
     PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS income_category_assigned_to_users(
     id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
     user_id bigint(20) unsigned NOT NULL,
     name varchar(255) NOT NULL,
     PRIMARY KEY(id),
     FOREIGN KEY (user_id) REFERENCES users(id)  
);


CREATE TABLE IF NOT EXISTS incomes(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id bigint(20) unsigned NOT NULL,
    income_category_assigned_to_user_id bigint(20) unsigned NOT NULL,
    amount decimal(10,2) NOT NULL,
    date_of_income datetime NOT NULL,
    income_comment varchar(255),
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users (id)
    -- FOREIGN KEY (income_category_assigned_to_user_id) REFERENCES income_category_assigned_to_users (id)  
);




IF NOT EXISTS (SELECT 1 FROM income_category_default WHERE name = 'Wypłata') THEN
    INSERT INTO income_category_default (name) VALUES 
    ('Wypłata'),
    ('Inwestycje'),
    ('Dochód pasywny'),
    ('Odsetki'),
    ('Inne');
END IF;

IF NOT EXISTS (SELECT 1 FROM expense_category_default WHERE name = 'Jedzenie') THEN
        INSERT INTO expense_category_default (name) VALUES 
        ('Jedzenie'),
        ('Paliwo'),
        ('Transport'),
        ('Taxi'),
        ('Rozrywka'),
        ('Zdrowie'),
        ('Ubrania'),
        ('Higiena'),
        ('Dzieci'),
        ('Wycieczka'),
        ('Oszczędności'),
        ('Na emeryturę'),
        ('Spłata długu'),
        ('Prezenty');
END IF;
