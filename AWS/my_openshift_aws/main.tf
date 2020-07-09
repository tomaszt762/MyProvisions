provider "aws" {
  region                      = var.aws_region
  skip_credentials_validation = true
  skip_requesting_account_id  = true
  skip_metadata_api_check     = true
  access_key                  = var.aws_access_key_id
  secret_key                  = var.aws_secret_access_key

  endpoints {
    ec2            = "http://localhost:4566"
    route53        = "http://localhost:4566"
    iam            = "http://localhost:4566"
    kms            = "http://localhost:4566"
    secretsmanager = "http://localhost:4566"
  }

}

# VPC Module

module "vpc" {
  source                   = "./modules/vpc"
  infrastructure_id        = var.infrastructure_id
  aws_region               = var.aws_region
  vpc_cidr                 = var.cidr_block
  default_tags             = var.default_tags
  aws_azs                  = var.aws_azs
  vpc_private_subnet_cidrs = var.vpc_private_subnet_cidrs

}
# ---------------------------
#     "${module.vpc.private_network.infrastructure_id}"
#     "${module.vpc.clustername}"
#     "${module.vpc.private_vpc_id}"
#     "${module.vpc.private_vpc_private_subnet_ids}"
#     "${module.vpc.private_vpc_public_subnet_ids}"
# ---------------------------


