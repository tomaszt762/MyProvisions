resource "aws_launch_configuration" "launc-config" {
  name_prefix     = "launc-config"
  image_id        = "${lookup(var.ami, var.AWS_REGION)}"
  instance_type   = "t2.micro"
  key_name        = "${aws_key_pair.key.id}"
  security_groups = ["${aws_security_group.allow-ssh.id}"]
  user_data       = "${file("./InstallApache.sh")}"
  lifecycle {
    create_before_destroy = "true"
  }
}

resource "aws_autoscaling_group" "autoscaling" {
  name                      = "autoscaling"
  vpc_zone_identifier       = ["${aws_subnet.main-private-1.id}", "${aws_subnet.main-private-2.id}", "${aws_subnet.main-private-3.id}"]
  launch_configuration      = "${aws_launch_configuration.launc-config.id}"
  min_size                  = "2"
  max_size                  = "3"
  health_check_grace_period = "60"

  //health_check_type = "EC2"
  health_check_type = "ELB"
  load_balancers    = ["${aws_elb.my-elb.id}"]

  force_delete = "true"

  tag {
    value               = "Ec2 instance"
    key                 = "Name"
    propagate_at_launch = "true"
  }
}
