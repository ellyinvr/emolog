INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('山崎','test01@test','MEMO1',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('木山','test02@test','MEMO1',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('鈴木','test03@test','MEMO1',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('佐々木','test04@test','MEMO1',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('中村','test05@test','MEMO1',sysdate());

SELECT * FROM gs_an_table
SELECT id,name FROM gs_an_table
SELECT * FROM gs_an_table WHERE name='山崎'
SELECT * FROM gs_an_table WHERE id=1
SELECT * FROM gs_an_table WHERE id=1 OR id=2
SELECT * FROM gs_an_table WHERE name LIKE '%山%'
SELECT * FROM gs_an_table ORDER BY id DESC --降順
SELECT * FROM gs_an_table ORDER BY id DESC LIMIT 3

