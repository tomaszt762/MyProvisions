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
