resource "aws_security_group" "allow-ssh"{
    vpc_id = aws_vpc.main.id
    name = "allow-ssh"
    description = "SG to allow ssh access" 
    ingress {
        from_port = 22
        to_port = 22
        protocol = "tcp"
        cidr_blocks = ["${chomp(data.http.myip.body)}/32"]
           
    }
    egress  {
        from_port = 0
        to_port = 0
        protocol = "-1"
        cidr_blocks = ["0.0.0.0/0"]
        self = "true"
    }
    tags = {
    Name = "AllowSsh"
}

}

resource "aws_security_group" "allow-mariadb" {
    vpc_id = aws_vpc.main.id
    name = "allow-mariadb"
    description = "SG To Allow Access to Database"
    ingress {
        from_port = 3306
        to_port = 3306
        protocol = "tcp"
        security_groups = [aws_security_group.allow-ssh.id]
    }
    egress {
      from_port = 0
      to_port = 0
      protocol = "-1"   
      cidr_blocks  = ["0.0.0.0/0"]
      self = true
    }

tags = {
    Name = "AllowMariaDb"
}
}
