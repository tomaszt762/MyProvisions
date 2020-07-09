resource "aws_instance" "myec2" {
  ami                    = "${lookup(var.ami, var.AWS_REGION)}"
  instance_type          = "t2.medium"
  subnet_id              = "${aws_subnet.main-public-1.id}"
  vpc_security_group_ids = ["${aws_security_group.allow-ssh.id}"]
  key_name               = "${aws_key_pair.key.id}"
  iam_instance_profile = "${aws_iam_instance_profile.s3-mybucket-role-instanceprofile.id}"
}
