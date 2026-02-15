INSERT INTO categories (name, created_at, updated_at)
VALUES 
('Category 1', NOW(), NOW()),
('Category 2', NOW(), NOW()),
('Category 3', NOW(), NOW()),
('Category 4', NOW(), NOW());

SELECT * FROM categories;

DELETE FROM categories
WHERE id IN (10, 11, 12, 13);

SELECT * FROM categories;

UPDATE categories SET name = 'Category 1' WHERE id = 6;
UPDATE categories SET name = 'Category 2' WHERE id = 7;
UPDATE categories SET name = 'Category 3' WHERE id = 8;
UPDATE categories SET name = 'Category 4' WHERE id = 9;

TRUNCATE categories;

INSERT INTO categories (name, created_at, updated_at)
VALUES 
('Category 1', NOW(), NOW()),
('Category 2', NOW(), NOW()),
('Category 3', NOW(), NOW()),
('Category 4', NOW(), NOW());

SELECT * FROM categories;



