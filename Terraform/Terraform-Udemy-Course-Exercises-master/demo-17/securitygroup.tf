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
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port = 0
    to_port   = 0
    protocol  = "-1"
    self      = "true"
  }

  tags {
    Name = "Allow-ssh"
  }
}



resource "aws_security_group" "allow-mysql" {
  vpc_id      = "${aws_vpc.main.id}"
  name        = "Allow-mysql"
  description = "Sg to allow mysql access"

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port       = 3306
    to_port         = 3306
    protocol        = "tcp"
    security_groups = ["${aws_security_group.allow-ssh.id}"]
  }

  ingress {
    from_port = 0
    to_port   = 0
    protocol  = "-1"
    self      = "true"
  }

  tags {
    Name = "Allow-mysql"
  }
}
