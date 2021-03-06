# Terraform supports simple and complex data types
locals {
  a_string  = "This is a string."
  a_number  = 3.1415
  a_boolean = true
  a_list = [
    "elementl",
    2,
    "three"
  ]
  a_map = {
    key1 = "value1"
    key2 = "value2"
  }

  # Complex
  person = {
    name = "Robert Jordan",
    phone_numbers = {
      home   = "415â444â1212",
      mobile = "415-555-1313"
    },
    active = false,
    age    = 32
  }

  //Logical
  t = true || false // 0R true if either value is true
  f = true && false // AND true if both values are true
  //Comparison
  gt  = 2 > 1  // true if right value is greater
  gte = 2 >= 1 // true if right value is greater or equal
  lt  = 1 < 2  //true if left value is greater
  lte = 1 <= 2 // true if left value is greate or equal
  eq  = 1 == 1 // true if left and right are equal
  neq = 1 != 2 // true if left and right are not equal


}

output "home_phone" {
  value = local.person.phone_numbers.home
}


locals {
  //Date and Time
  ts            = timestamp() //Returns the current date and time.
  current_month = formatdate("MMMM", local.ts)
  tomorrow      = formatdate("DD", timeadd(local.ts, "24h"))
}
output "date_time" {
  value = "${local.current_month} ${local.tomorrow}"
}

locals {
  //Numer1c
  number_of_buckets_2 = max(local.minimum_number_of_buckets, var.bucket_count)

  //String
  lcase          = lower("A mixed case String")
  ucase          = upper("a lower case string")
  trimmed        = trimspace(" A string with leading and trailing spaces ")
  formatted      = format("Hello %s", "World")
  formatted_list = formatlist("Hello %s", ["John", "Paul", "George", "Ringo"])
}



resource "null_resource" "null_id" {
  provisioner "local-exec" {
    command = "echo ${module.container.container_name}:${module.container.ip} >> container.txt"
  }
}



#Interpolation
data "aws_caller_identity" "current" {}
data "aws_availability_zone" "available" {
  state = "available"
}

resource "aws_s3_bucket" "bucket2" {
  bucket = "${data.aws_caller_identity.current.account_id}âbucket2"
}

#Dependency
resource "aws_s3_bucket" "bucket3" {
  bucket = "${data.aws_caller_identity.current.account_id}âbucket3"
  tags = {
    # Implicit dependency
    dependency = aws_s3_bucket.bucket2.arn
  }
}

resource "aws_s3_bucket" "bucket4" {
  bucket = "${data.aws_caller_identity.current.account_id}âbucket4"
  # Explicit
  depends_on = [
    aws_s3_bucket.bucket3
  ]
}





#if statement
variable "number_of_buckets" {
  default = 1
}
resource "aws_s3_bucket" "my_bucket" {
  count  = var.number_of_buckets != 0 ? var.number_of_buckets : 1
  bucket = "my-bucket-${var.number_of_buckets}"
}

#Count
resource "aws_s3_bucket" "bucketX" {
  count  = 5
  bucket = "${local.aws_account}-bucket${count.index + 7}"
}

#loop
variable "users" {
  default = ["batman", "superman", "ironman"]
}
resource "aws_iam_user" "users" {
  for_each = toset(var.users)
  name     = each.value
}


locals {
  buckets1 = {
    bucket101 = "mybucket101"
    bucket102 = "mybucket102"
  }
}


resource "aws_s3_bucket" "bucketE" {
  for_each = local.buckets1
  bucket   = "${local.aws_account}â${each.value}"
}

locals {
  buckets2 = [
    "mybucket101",
    "mybucket102"
  ]
}

resource "aws_s3_bucket" "bucketE" {
  for_each = toset(local.buckets2)
  bucket   = "${local.aws_account}â${each.key}"
}

output "bucketX" {
  value = aws_s3_bucket.bucketE
}


#Iteration
locals {
  l          = ["one", "two", "three"]
  upper_list = [for item in local.l : upper(item)]
  upper_map  = { for item in local.l : item => upper(item) }
}
output "iterations" {
  value = local.upper_list
}

locals {
  n     = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
  evens = [for i in local.n : i if i % 2 == 0]
}
output "filtered" {
  value = local.evens
}

variable "asg_tags" {
  type = map(string)
  default = {
    Name = "ASG_EC2"
    Type = "m4.large"
    Team = "DEV"
  }
}

resource "aws_autoscaling_group" "asg" {
  max_size = 0
  min_size = 0

  dynamic "tag" {
    for_each = var.asg_tags
    content {
      key                 = tag.key
      value               = tag.value
      propagate_at_launch = true
    }
  }
}

output "uppercase_heroes" {
  value = [for hero in var.users : upper(hero) if length(hero) < 7]
}

#dynamic block
variable "asg_tags" {
  type = map(string)
  default = {
    Name = "ASG_EC2"
    Type = "m4.large"
    Team = "DEV"
  }
}

resource "aws_autoscaling_group" "asg" {
  max_size = 0
  min_size = 0

  dynamic "tag" {
    for_each = var.asg_tags
    content {
      key                 = tag.key
      value               = tag.value
      propagate_at_launch = true
    }
  }
}

#heredoc
output "heredoc" {
value = <<-EOT
This is called a `heredoc`. It's a string literal
that can span multiple lines.
EOT
}   

#directive
output "directive" {
value = <<-EOT 
This is a `heredoc` with directives.
%{ if local.person.name == "" }
Sorry, I don't know your name.
%{ else }
Hi ${local.person.name}
%{ endif }
EOT
}   

#iterated
output "iterated" {
value = <<-EOT
Directives can also iterate...
%{ for number in local.evens }
${number} is even.
%{ endfor }
EOT
} 