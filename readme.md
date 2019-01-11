## Instalação

- composer install
- php artisan migrate
- php artisan db:seed
- php artisan key:generate
- criar as pastas: dentro de storage(edicao, pdfs)

## Configurações PHP.ini

- Ativar a extensão SOAP para que seja possível consultar a API de autenticação dos assinantes: "extension=php_soap.dll"
- Permitir o envio de pelo menos 30 arquivos via upload: "max_file_uploads=30"
- Permitir o envio de arquivos de até 100mb: "upload_max_filesize=100M"
- Ajuste no tamanho do POST para que seja possível o envio de vários arquivos: "post_max_size=200M"


## Software necessários

- Ghostscript versão 9.26