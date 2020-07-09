resource "aws_instance" "myec2" {
  ami                    = "${lookup(var.ami, var.AWS_REGION)}"
  instance_type          = "t2.medium"
  subnet_id              = "${aws_subnet.main-public-1.id}"
  vpc_security_group_ids = ["${aws_security_group.allow-ssh.id}"]
  key_name               = "${aws_key_pair.key.id}"
}

resource "aws_ebs_volume" "ebs-volume-1" {
  availability_zone = "${var.AWS_REGION}a"
  size              = "20"
  type              = "gp2"

  tags = {
    Name = "Extra Volume"
  }
}

resource "aws_volume_attachment" "ebs-volume-1-attachment" {
  device_name = "/dev/xvdh"
  volume_id   = "${aws_ebs_volume.ebs-volume-1.id}"
  instance_id = "${aws_instance.myec2.id}"
}
