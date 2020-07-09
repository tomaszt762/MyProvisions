resource "aws_db_subnet_group" "mariadb-subnet" {
  name        = "mariadb-subnet"
  subnet_ids  = ["${aws_subnet.main-private-1.id}", "${aws_subnet.main-private-2.id}", "${aws_subnet.main-private-3.id}"]
  description = "RDS Subnet private Group"
}

resource "aws_db_parameter_group" "mariadb-parameters" {
  name        = "mariadb-parameters"
  family      = "mariadb10.1"
  description = "Maria DB Parameter Group"

  parameter {
    name  = "max_allowed_packet"
    value = "16777216"
  }
}

resource "aws_db_instance" "mariadb" {
  allocated_storage       = "20"
  engine                  = "mariadb"
  engine_version          = "10.1.14"
  instance_class          = "db.t2.small"
  identifier              = "mariadb"
  name                    = "mariadb"
  username                = "root"
  password                = "${var.rds_password}"
  db_subnet_group_name    = "${aws_db_subnet_group.mariadb-subnet.id}"
  parameter_group_name    = "${aws_db_parameter_group.mariadb-parameters.id}"
  multi_az                = "false"
  vpc_security_group_ids  = ["${aws_security_group.allow-mysql.id}"]
  storage_type            = "gp2"
  backup_retention_period = "30"
  availability_zone       = "${aws_subnet.main-private-1.availability_zone}"
  skip_final_snapshot     = "true"

  tags = {
    Name = "Terra Deploy Maria DB"
  }
}
