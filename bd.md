```sql
CREATE TABLE usuarios (
    id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45),
    senha VARCHAR(45),
    tipo ENUM ('admin', 'editor')
);
```

```sql
CREATE TABLE noticias (
    id MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data DATETIME NOT NULL,
    titulo VARCHAR(100) NOT NULL,
)
```