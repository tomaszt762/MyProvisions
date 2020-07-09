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
    }

}