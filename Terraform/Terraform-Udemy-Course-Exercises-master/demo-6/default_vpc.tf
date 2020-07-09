#Default VPC Info
resource "aws_default_vpc" "default" {
    tags = {
        Name = "Default VPC"
    }
}

#Default Subnets
resource "aws_default_subnet" "default_az1" {
  availability_zone = "${var.AWS_REGION}a"

  tags = {
      Name = "Default Subnet for ${var.AWS_REGION}a"
  }
}

resource "aws_default_subnet" "default_az2" {
  availability_zone = "${var.AWS_REGION}b"

  tags = {
      Name = "Default Subnet for ${var.AWS_REGION}b"
  }
}


resource "aws_default_subnet" "default_az3" {
  availability_zone = "${var.AWS_REGION}c"

  tags = {
      Name = "Default Subnet for ${var.AWS_REGION}c"
  }
}


