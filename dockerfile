# Usa a imagem oficial do PHP com Apache integrado
FROM php:8.2-apache

# Instala as extensões do PHP necessárias para conexão com bancos de dados MySQL/MariaDB
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Ativa o módulo rewrite do Apache (comum para rotas amigáveis em frameworks ou CRUDs simples)
RUN a2enmod rewrite

# Copia todos os arquivos do seu CRUD local para o diretório padrão do Apache no container
COPY . /var/www/html/

# Define as permissões corretas para o Apache ler os arquivos
RUN chown -R www-data:www-data /var/www/html

# O Apache roda por padrão na porta 80 dentro do container
EXPOSE 80