variable "AWS_ACCESS_KEY" {
}

variable "AWS_SECRET_KEY" {
}

variable "AWS_REGION" {
  default = "eu-east-1"
}
variable "PATH_TO_PUBLIC_KEY" {
  default = "mykey.pub"
}

variable "PATH_TO_PRIVATE_KEY" {
  default = "mykey"
}

variable "AMIS" {
  type = map(string)
  default = {
    us-east-1 = "ami-13be557e"
    us-west-2 = "ami-06b94666"
    eu-west-1 = "ami-844e0bf7"
  }
}

variable "DEFAULT_PASSWORD" {
  default = "Y0urP4$$w0rdH3r3"
}

data "http" "myip" {
  url = "http://ipv4.icanhazip.com"
}



variable "ENV" {
  default = "prod"
}
