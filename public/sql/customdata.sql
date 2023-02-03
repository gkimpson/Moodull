INSERT INTO departments (name, code, description) values ('English', 'ENG-001', 'Description...');
INSERT INTO departments (name, code, description) values ('Maths', 'MATH-001', 'Description...');
INSERT INTO departments (name, code, description) values ('Science', 'SCI-001', 'Description...');

INSERT INTO courses (department_id, name, description, code) values ('1', 'English Literature', 'Desc', 'ENG-001-LIT');
INSERT INTO courses (department_id, name, description, code) values ('2', 'Stats', 'Desc', 'MATH-001-STAT');
INSERT INTO courses (department_id, name, description, code) values ('3', 'Biology', 'Desc', 'SCI-001-BIO');
INSERT INTO courses (department_id, name, description, code) values ('3', 'Physics', 'Desc', 'SCI-001-PHY');
INSERT INTO courses (department_id, name, description, code) values ('3', 'Chemistry', 'Desc', 'SCI-001-CHE');
