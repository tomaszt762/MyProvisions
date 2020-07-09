// AWS VPC
resource "aws_vpc" "main" {
  cidr_block           = "10.0.0.0/16"
  instance_tenancy     = "default"
  enable_dns_hostnames = "true"
  enable_dns_hostnames = "true"
  enable_classiclink   = "false"

  tags = {
    Name = "Terra VPC"
  }
}

// Public Subnets
resource "aws_subnet" "main-public-1" {
  vpc_id                  = "${aws_vpc.main.id}"
  cidr_block              = "10.0.1.0/24"
  map_public_ip_on_launch = "true"
  availability_zone       = "${var.AWS_REGION}a"

  tags = {
    Name = "Public Subnet 01"
  }
}

resource "aws_subnet" "main-public-2" {
  vpc_id                  = "${aws_vpc.main.id}"
  cidr_block              = "10.0.2.0/24"
  map_public_ip_on_launch = "true"
  availability_zone       = "${var.AWS_REGION}b"

  tags = {
    Name = "Public Subnet 02"
  }
}

resource "aws_subnet" "main-public-3" {
  vpc_id                  = "${aws_vpc.main.id}"
  cidr_block              = "10.0.3.0/24"
  map_public_ip_on_launch = "true"
  availability_zone       = "${var.AWS_REGION}c"

  tags = {
    Name = "Public Subnet 03"
  }
}

// Private Subnets

resource "aws_subnet" "main-private-1" {
  vpc_id                  = "${aws_vpc.main.id}"
  cidr_block              = "10.0.4.0/24"
  map_public_ip_on_launch = "false"
  availability_zone       = "${var.AWS_REGION}a"

  tags = {
    Name = "Private Subnet 01"
  }
}

resource "aws_subnet" "main-private-2" {
  vpc_id                  = "${aws_vpc.main.id}"
  cidr_block              = "10.0.5.0/24"
  map_public_ip_on_launch = "false"
  availability_zone       = "${var.AWS_REGION}b"

  tags = {
    Name = "Private Subnet 02"
  }
}

resource "aws_subnet" "main-private-3" {
  vpc_id                  = "${aws_vpc.main.id}"
  cidr_block              = "10.0.6.0/24"
  map_public_ip_on_launch = "false"
  availability_zone       = "${var.AWS_REGION}c"

  tags = {
    Name = "Private Subnet 03"
  }
}

// Internet Gateway
resource "aws_internet_gateway" "main-gw" {
  vpc_id = "${aws_vpc.main.id}"

  tags = {
    Name = "Main Intetnet GW"
  }
}

// Route Table

resource "aws_route_table" "public-rt" {
  vpc_id = "${aws_vpc.main.id}"

  route = {
    cidr_block = "0.0.0.0/0"
    gateway_id = "${aws_internet_gateway.main-gw.id}"
  }

  tags = {
    Name = "Public Route Table"
  }
}

// Route Table Association
resource "aws_route_table_association" "main-pubic-1-a" {
  subnet_id      = "${aws_subnet.main-public-1.id}"
  route_table_id = "${aws_route_table.public-rt.id}"
}

resource "aws_route_table_association" "main-pubic-2-b" {
  subnet_id      = "${aws_subnet.main-public-2.id}"
  route_table_id = "${aws_route_table.public-rt.id}"
}

resource "aws_route_table_association" "main-pubic-3-c" {
  subnet_id      = "${aws_subnet.main-public-3.id}"
  route_table_id = "${aws_route_table.public-rt.id}"
}
