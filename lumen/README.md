# Setup Composer
    https://lar.edu.vn/huong-dan-cai-dat-composerphar-bo-quan-ly-thu-vien-danh-cho-php.html

# Install Lumen
    composer -v
    composer create-project --prefer-dist laravel/lumen lumen_app
    php -S localhost:8000 -t public

# Docker Check Version
    docker -v
    docker-compose -v

# Docker Setup
    Dockerfile
    docker-compose.yml

# Build 
    docker-compose up --build

# Database

   http://localhost:8080/
   
   User/Pass: root/root
   
   Add Database : company
   
   Add table : Users(id,name)
# Run 
    http://localhost:8000/

 
# Refer :
    https://yossiabramov.com/blog/setting-up-lumen-and-mysql-with-docker-part-i
    https://yossiabramov.com/blog/setting-up-lumen-and-mysql-with-docker-part-ii

# Remove
    docker rm -vf $(docker ps -aq);
    docker rmi -f $(docker images -aq);
    docker volume rm $(docker volume ls -q)

# Other
    docker container ls docker stop 12a32e8928ef 
    docker run -dp 8003:80 <image_name>
    docker exec -it <container> bash