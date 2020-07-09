// Nat Gateway
resource "aws_eip" "nat-eip" {
  vpc = "true"
}

resource "aws_nat_gateway" "nat-gw" {
  allocation_id = "${aws_eip.nat-eip.id}"
  subnet_id     = "${aws_subnet.main-public-1.id}"
  depends_on    = ["aws_internet_gateway.main-gw"]

  tags = {
    Name = "Nat Gateway"
  }
}

// Route Table
resource "aws_route_table" "private-subnet-rt" {
  vpc_id = "${aws_vpc.main.id}"

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = "${aws_nat_gateway.nat-gw.id}"
  }

  tags = {
    Name = "Private Route Table"
  }
}

// Route Table Association
resource "aws_route_table_association" "private-1-association" {
  subnet_id      = "${aws_subnet.main-private-1.id}"
  route_table_id = "${aws_route_table.private-subnet-rt.id}"
}

resource "aws_route_table_association" "private-2-association" {
  subnet_id      = "${aws_subnet.main-private-2.id}"
  route_table_id = "${aws_route_table.private-subnet-rt.id}"
}

resource "aws_route_table_association" "private-3-association" {
  subnet_id      = "${aws_subnet.main-private-3.id}"
  route_table_id = "${aws_route_table.private-subnet-rt.id}"
}
