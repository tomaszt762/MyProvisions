output "ec2IP" {
  value = "${aws_instance.myec2.public_ip}"
}
