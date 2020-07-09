variable "AWS_ACCESS_KEY" {
}

variable "AWS_SECRET_KEY" {
}

variable "AWS_REGION" {
  default = "eu-east-1"
}

variable "AMIS" {
  type = map(string)
  default = {
    us-east-1 = "ami-02b212aba9eb84405"
  }
}

variable "PATH_TO_PRIVATE_KEY" {
  default = "mykey"
}

variable "PATH_TO_PUBLIC_KEY" {
  default = "mykey.pub"
}

variable "INSTANCE_USERNAME" {
  default = "Adminlocal"
}

variable "INSTANCE_PASSWORD" {
  default = "Y0urP4$$w0rdH3r3"
}