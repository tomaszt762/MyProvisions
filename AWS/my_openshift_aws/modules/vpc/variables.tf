####### AWS Access and Region Details #############################
variable "aws_region" { type = string }
variable "vpc_cidr" { type = string }
variable "default_tags" { type = map(string) }
variable "infrastructure_id" { type = string }
variable "aws_azs" { type = list }

# Subnet Details
variable "vpc_private_subnet_cidrs" { type = list }
