resource "aws_security_group" "allow-ssh" {
  vpc_id      = "${aws_vpc.main.id}"
  name        = "Allow-SSH"
  description = "Sg to allow ssh access"

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port = 0
    to_port   = 0
    protocol  = "-1"
    self      = "true"
  }


  ingress {
  from_port = "22"
  to_port = "22"
  protocol = "tcp"
  cidr_blocks = ["${chomp(data.http.myip.body)}/32"]
}

  ingress {
    from_port       = 80
    to_port         = 80
    protocol        = "tcp"
    security_groups = ["${aws_security_group.elb-securitygroup.id}"]
  }

  tags {
    Name = "Allow-ssh"
  }
}

resource "aws_security_group" "elb-securitygroup" {
  vpc_id      = "${aws_vpc.main.id}"
  name        = "elb"
  description = "security group for load balancer"

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = {
    Name = "elb"
  }
}
