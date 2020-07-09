variable "AWS_REGION" {
  default = "eu-east-1"
}

//  Pick up the AK and SK from my local vars
variable "accesskey" {}

variable "secretkey" {}

variable "ami" {
  type = "map"

  default = {
    us-east-1 = "ami-04b9e92b5572fa0d1" // N. Virginia
    us-west-2 = "ami-04b762b4289fba92b" // Oregon
    eu-west-1 = "ami-0ce71448843cb18a1" // Ireland

    // Ubuntu Images https://cloud-images.ubuntu.com/locator/ec2/
  }
}

//variable "PATH_TO_PRIVATE_KEY" {
//  default = "${file("./rsa-key-20191015")}"
//}

variable "PATH_TO_PUBLIC_KEY" {
  default = "./mykey.pub"
}

variable "INSTANCE_USERNAME" {
  default = "ubuntu"
}

data "http" "myip" {
  url = "http://ipv4.icanhazip.com"
}