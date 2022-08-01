```sql
CREATE TABLE usuarios (
    id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM ('admin', 'editor') NOT NULL
);
```

```sql
CREATE TABLE categorias(
    id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL
);
```

```sql
CREATE TABLE noticias (
    id MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    titulo VARCHAR(150) NOT NULL, 
    texto TEXT NOT NULL,
    resumo TINYTEXT NOT NULL ,
    imagem VARCHAR(45) NOT NULL,
    destaque ENUM('sim','nao') NOT NULL,
    usuario_id SMALLINT NULL,
    categoria_id SMALLINT NULL
);
```

```sql
ALTER TABLE noticias
    ADD CONSTRAINT fk_noticias_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    ON DELETE SET NULL ON UPDATE NO ACTION;
```

```sql
ALTER TABLE noticias
    ADD CONSTRAINT fk_noticias_categorias
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
    ON DELETE SET NULL ON UPDATE NO ACTION;
```