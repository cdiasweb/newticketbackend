# newticketbackend
Backend to new ticket project

1. Para rodar este projeto você precisa instalar o docker na versão 20+
sudo apt-get update
sudo apt-get -y install apt-transport-https ca-certificates curl software-properties-common

Agora importaremos a chave do pacote docker:

curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

Agora iremos adicionar o repositório do docker ao nosso sistema:

sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(. /etc/os-release; echo "$UBUNTU_CODENAME") stable"

Em seguida iremos atualizar a lista de pacotes:

sudo apt-get update

Por fim, instalaremos o docker e o docker-compose:

sudo apt-get -y install docker-ce docker-compose

Será necessário adicionar nosso usuário ao grupo do docker para não haver necessidade de utilização do "sudo".

sudo usermod -aG docker $USER

Verificando a versão do docker instalado:

docker --version
Docker version 19.03.12, build 48a66213fe

2. Após instalar o docker, baixar o projeto com o comando abaixo:
git clone https://github.com/cdiasweb/newticketbackend.git

3. Instale o Composer para instalar as dependências do projeto:
Rode o comando: ./composer.sh
Após: ./composer.phar install

4. Iniciar o projeto:
./vendor/bin/sail up

