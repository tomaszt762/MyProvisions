# Create private subnet in each AZ for the dmz
resource "aws_subnet" "ocp_pri_subnet" {
  count = length(var.aws_azs)

  vpc_id            = aws_vpc.ocp_vpc.id
  cidr_block        = element(var.vpc_private_subnet_cidrs, count.index)
  availability_zone = format("%s%s", element(list(var.aws_region), count.index), element(var.aws_azs, count.index))

  tags = merge(
    var.default_tags,
    map(
      "Name", "${format("${var.infrastructure_id}-pub-%s-pri", format("%s%s", element(list(var.aws_region), count.index), element(var.aws_azs, count.index)))}",
      "kubernetes.io/cluster/${var.infrastructure_id}", "shared"
    )
  )
}
