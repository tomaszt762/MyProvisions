
module "vpc-prod" {
  source  = "terraform-aws-modules/vpc/aws"
  version = "2.5.0"

  name = "vpc-prod"
  cidr = "10.1.0.0/16"

  azs             = ["${var.AWS_REGION}a", "${var.AWS_REGION}b", "${var.AWS_REGION}c"]
  private_subnets = ["10.1.0.0/24", "10.1.1.0/24", "10.1.2.0/24"]
  public_subnets  = ["10.1.100.0/24", "10.1.101.0/24", "10.1.102.0/24"]


  enable_nat_gateway = true
  single_nat_gateway = true
  enable_vpn_gateway = false

  tags = {
    Terraform   = "true"
    Environment = "prod"
  }
}


module "vpc-dev" {
  source  = "terraform-aws-modules/vpc/aws"
  version = "2.5.0"

  name = "vpc-dev"
  cidr = "10.0.0.0/16"

  azs             = ["${var.AWS_REGION}a", "${var.AWS_REGION}b", "${var.AWS_REGION}c"]
  private_subnets = ["10.0.0.0/24", "10.0.1.0/24", "10.0.2.0/24"]
  public_subnets  = ["10.0.100.0/24", "10.0.101.0/24", "10.0.102.0/24"]


  enable_nat_gateway = true
  single_nat_gateway = true
  enable_vpn_gateway = false

  tags = {
    Terraform   = "true"
    Environment = "dev"
  }
}