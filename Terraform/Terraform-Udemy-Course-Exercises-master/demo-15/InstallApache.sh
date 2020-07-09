#! /bin/bash
sudo apt-get update
sudo apt-get install -y apache2
sudo systemctl start apache2
sudo systemctl enable apache2
echo "<h3>Deployed via Terraform And AWS Auto Scaling</h3>" | sudo tee /var/www/html/index.html
echo "<h1>@witaloandrade</h1>"  | sudo tee -a /var/www/html/index.html
curl http://169.254.169.254/latest/meta-data/public-hostname/ | sudo tee -a /var/www/html/index.html