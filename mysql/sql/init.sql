DROP SCHEMA IF EXISTS posse;
CREATE SCHEMA posse;
USE posse;

DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

INSERT INTO big_questions SET name='東京の難読地名クイズ';
INSERT INTO big_questions SET name='広島の難読地名クイズ';

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  big_question_id INT NOT NULL,
  image VARCHAR(255) NOT NULL
);

INSERT INTO
    questions(big_question_id, image)
VALUES
    (1, "https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png"),
    (1, "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png"),
    (2, "https://d1khcm40x1j0f.cloudfront.net/quiz/d876208414d51791af9700a0389b988b.png"),
    (2, "https://tektektech.com/wp-content/uploads/2019/08/ss-334.png");

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  question_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  valid TINYINT(1) NOT NULL DEFAULT '0'
);

INSERT INTO
    choices(question_id, name, valid)
VALUES
    (1, 'たかなわ', 1),
    (1, 'たかわ', 0),
    (1, 'こうわ', 0),
    (2, 'かめと', 0),
    (2, 'かめど', 0),
    (2, 'かめいど', 1),
    (3, 'むこうひら', 0),
    (3, 'むきひら', 0),
    (3, 'むかいなだ', 1),
    (4, 'laravel', 1),
    (4, 'larabel', 0),
    (4, 'raravel', 0);
