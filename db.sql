//banco chamado veiculos , conferir db.php.

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    disponivel BOOLEAN DEFAULT 1
);
